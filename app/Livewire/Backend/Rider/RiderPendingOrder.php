<?php

namespace App\Livewire\Backend\Rider;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\RiderOrder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RiderPendingOrder extends Component
{
    public $perPage;
    public $start;
    public $end;
    public $total;
    public $currentPage;


    public function render()
    {

        date_default_timezone_set('Asia/Dhaka');
        $now = now(); // Assuming using Laravel's Carbon library for handling dates and times
        $restaurant = Restaurant::where('status', 1)
            ->whereTime('open', '<=', $now)
            ->whereTime('close', '>=', $now)
            ->get();
        $distances = [];
        $filteredRestaurants = $restaurant->filter(function ($item) use (&$distances) {
            $distance = $this->getDistanceByCoordinates(
                session('google_given_rider_latitude'),
                session('google_given_rider_longitude'),
                $item->restaurant_google_latitude,
                $item->restaurant_google_longitude
            );

            // For testing purposes, it is 3; later it will be 0.5
            if ($distance <= 3) {
                $distances[$item->id] = $distance;
                return true;
            }

            return false;
        });
        $restaurant_ids = $filteredRestaurants->pluck('id')->toArray();
        $orders = Order::where('status', 'confirmed_by_restaurant')->whereIn('restaurant_id', $restaurant_ids)
            ->with('restaurant', 'carts')
            ->get()
            ->groupBy('restaurant_id')
            ->toArray();
        return view('livewire.backend.rider.rider-pending-order', compact('orders', 'distances'));
    }
    public function getDistanceByCoordinates($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $unit = 'K')
    {
        // Calculate distance between latitude and longitude
        $theta = $longitudeFrom - $longitudeTo;
        $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        // Convert unit and return distance
        $unit = strtoupper($unit);
        if ($unit == "K") {
            return round($miles * 1.609344, 2);
        } elseif ($unit == "M") {
            return round($miles, 2) . ' miles';
        } else {
            return round($miles * 1609.344, 2) . ' meters';
        }
    }
    public function placeOrder($id)
    {
        $adminId = Auth::guard('admin')->id();
        $parallelOrders = Order::where('rider_id', $adminId)
            ->where('status', 'Restaurant_Rider_Confirmed')
            ->orWhere('status','Rider_Picked')
            ->get();
        if ($parallelOrders->count() >= 3) {
            $notification = array(
                'message' => 'Order assigned failed due to maximum assigned threshold (3) limit exceeded.',
                'alert-type' => 'info'
            );
            return redirect()->route('ridersettings.index')->with($notification);
            // return redirect()->route('ridersettings.index')
            //     ->with('message', 'Order assigned failed due to maximum assigned threshold (3) limit exceeded.');
        }
        $order = Order::findOrFail($id);
        if ($parallelOrders->isNotEmpty() && $parallelOrders->first()->restaurant_id != $order->restaurant_id) {
            $notification = array(
                'message' => 'Multiple orders are only accepted in the same restaurant.',
                'alert-type' => 'error'
            );
            return redirect()->route('ridersettings.index')->with($notification);
            // return redirect()->route('ridersettings.index')->with('error', 'Multiple orders are only accepted in the same restaurant.');
        }
        if ($order->rider_id === null) {
            RiderOrder::insertOrIgnore([
                'order_id' => $id,
                'rider_id' => $adminId,
                'status' => 'Rider_confirmed',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $RiderOrder = RiderOrder::where('order_id', $id)
            ->orderBy('created_at', 'ASC')
            ->orderBy('id', 'ASC')
            ->first();
            if($adminId!=$RiderOrder->rider_id){
                $notification = array(
                    'message' => 'Order already occupied.',
                    'alert-type' => 'info'
                );
                return redirect()->route('ridersettings.index')->with($notification);
                // return redirect()->route('ridersettings.index')->with('error', 'Order already occupied.');
            }
            $order->update([
                'rider_id' => $RiderOrder->rider_id,
                'rider_confirm_datetime'=> now(),
                'status' => 'Restaurant_Rider_Confirmed'
            ]);
            $notification = array(
                'message' => 'Order successfully assigned.',
                'alert-type' => 'info'
            );
            return redirect()->route('ridersettings.index')->with($notification);
            // return redirect()->route('ridersettings.index')->with('message', 'Order successfully assigned.');
        } else {
            $notification = array(
                'message' => 'Order already occupied.',
                'alert-type' => 'info'
            );
            return redirect()->route('ridersettings.index')->with($notification);
            // return redirect()->route('ridersettings.index')->with('error', 'Order already occupied.');
        }
    }
    public function  perPagechange($val)
    {
        $this->perPage = (int)$val;
        $this->end = (int)$val;
    }
    public function paginate($page)
    {
        $this->start = $page * $this->perPage;
        $this->currentPage = $page;
        $this->end = $this->start + $this->perPage;
    }
}

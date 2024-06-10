<?php

namespace App\Livewire\Backend\Order;

use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class RiderConfirmOrder extends Component
{
    public $perPage;
    public $start;
    public $end;
    public $total;
    public $couponData;
    public $ordersearch;
    public $currentPage;

    #[On("riderConfirmOrder")]
    public function render()
    {
        if ($this->perPage == null) {
            $this->perPage = 3;
            $this->start = 0;
            $this->end = 3;
            $this->currentPage = 0;
        }
        $restaurent_id = Restaurant::where('user_id', Auth::user()->id)->pluck('id');

        // Check if $restaurent_id is null
        if ($restaurent_id == null) {
            $orders = null;
        } else {
            $orders = Order::with('restaurant')->whereIn('restaurant_id', $restaurent_id)
                ->where(function ($query) {
                    $query->where('status', 'Restaurant_Rider_Confirmed')
                        ->orWhere('status', 'Rider_Picked');
                })
                ->orderBy('order_place_datetime', 'desc')
                ->skip($this->start)
                ->take($this->perPage)
                ->get();
        }
        $this->total = Order::with('restaurant')->whereIn('restaurant_id', $restaurent_id)
            ->where('status', 'Restaurant_Rider_Confirmed')
            ->orWhere('status', 'Rider_Picked')->count();
        return view('livewire.backend.order.rider-confirm-order', compact('orders'));
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
    public function pick($id)
    {
        $order = Order::findOrFail($id);
        if ($order) {
            $order->status = "Rider_Picked";
            $order->restaurant_complete_datetime = now();
            $order->update();
            session()->flash('riderConfirmOrder', 'Order ID#' . $id . ' Marked as picked');
            $this->dispatch('riderConfirmOrder');
        } else {
            session()->flash('riderConfirmOrder', 'Order ID#' . $id . ' mark failed.');
        }
    }
}

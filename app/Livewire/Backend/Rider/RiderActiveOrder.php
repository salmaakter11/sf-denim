<?php

namespace App\Livewire\Backend\Rider;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RiderActiveOrder extends Component
{
    public $perPage;
    public $start;
    public $end;
    public $total;
    public $currentPage;
    public function render()
    {
        $orders = Order::where('status', 'Rider_Picked')
        ->where('rider_id',Auth::guard('admin')->id())
        ->orWhere('status','Restaurant_Rider_Confirmed')
        ->with('restaurant', 'carts')
        ->get();
        return view('livewire.backend.rider.rider-active-order',compact('orders'));
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
    public function markasdelivered($id){
        $order = Order::findOrFail($id);
        if($order){
            $order->status = "delivered_by_rider";
            $order->rider_complete_datetime = now();
            $order->update();
            session()->flash('pendingOrder','Order ID#'.$id.' Confirmed');
            $this->dispatch('pendingOrder');           
        }else{
            session()->flash('pendingOrder','Order ID#'.$id.' confirmation failed.');
        }
    }
}

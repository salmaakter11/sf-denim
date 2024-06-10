<?php

namespace App\Livewire\Backend\Order;

use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class RestaurantConfirmOrder extends Component
{
    public $perPage;
    public $start;
    public $end;
    public $total;
    public $couponData;
    public $ordersearch;
    public $currentPage;

    #[On("restaurentConfirmOrder")]
    public function render()
    {
        if ($this->perPage == null) {
            $this->perPage = 3;
            $this->start = 0;
            $this->end = 3;
            $this->currentPage = 0;
        }
        $orders = Order::where('status','confirmed')->orderBy('order_confirm_datetime', 'desc')->skip($this->start)->take($this->perPage)->get();
        $this->total = Order::where('status','confirmed')->count();
        return view('livewire.backend.order.restaurant-confirm-order', compact('orders'));
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
    public function cancel($id){
        $order = Order::findOrFail($id);
        if($order){
            $order->status = "cancelled";
            $order->order_cancel_datetime = now();
            $order->update();
            session()->flash('pendingOrder','Order ID#'.$id.' Cancelled');
            $this->dispatch('pendingOrder');           
        }else{
            session()->flash('pendingOrder','Order ID#'.$id.' cancellation failed.');
        }
    }
    public function confirm($id){
        $order = Order::findOrFail($id);
        if($order){
            $order->status = "delevered";
            $order->order_complete_datetime = now();
            $order->update();
            session()->flash('pendingOrder','Order ID#'.$id.' Confirmed');
            $this->dispatch('pendingOrder');           
        }else{
            session()->flash('pendingOrder','Order ID#'.$id.' confirmation failed.');
        }
    }
}

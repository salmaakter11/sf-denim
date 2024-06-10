<?php

namespace App\Livewire\Backend\Order;

use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class PendingOrderList extends Component
{
    public $perPage;
    public $start;
    public $end;
    public $total;
    public $currentPage;

    
    #[On("pendingOrder")]
    public function render()
    {
        if ($this->perPage == null) {
            $this->perPage = 3;
            $this->start = 0;
            $this->end = 3;
            $this->currentPage = 0;
        }
        $orders = Order::where('status','pending_order')->orderBy('order_place_datetime', 'desc')->skip($this->start)->take($this->perPage)->get();
        $this->total = Order::where('status','pending_order')->count();
        return view('livewire.backend.order.pending-order-list',compact('orders'));
    }
    public function  perPagechange($val)
    {
        $this->perPage = (int)$val;
        $this->end = (int)$val;
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
            $order->status = "confirmed";
            $order->order_confirm_datetime = now();
            $order->update();
            session()->flash('pendingOrder','Order ID#'.$id.' Confirmed');
            $this->dispatch('pendingOrder');           
        }else{
            session()->flash('pendingOrder','Order ID#'.$id.' confirmation failed.');
        }
    }
    public function paginate($page)
    {
        $this->start = $page * $this->perPage;
        $this->currentPage = $page;
        $this->end = $this->start + $this->perPage;
    }
}

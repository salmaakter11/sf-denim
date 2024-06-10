<?php

namespace App\Livewire\Backend\Order;

use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class SuccessDeliveryOrder extends Component
{
    public $perPage;
    public $start;
    public $end;
    public $total;
    public $currentPage;

    #[On("cancelOrder")]
    public function render()
    {
        if ($this->perPage == null) {
            $this->perPage = 3;
            $this->start = 0;
            $this->end = 3;
            $this->currentPage = 0;
        }
        $orders = Order::where('status','delevered')->orderBy('order_complete_datetime', 'desc')->skip($this->start)->take($this->perPage)->get();
        $this->total = Order::where('status','delevered')->count();
        return view('livewire.backend.order.success-delivery-order',compact('orders'));
    }
}

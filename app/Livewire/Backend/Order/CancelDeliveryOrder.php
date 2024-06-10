<?php

namespace App\Livewire\Backend\Order;

use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class CancelDeliveryOrder extends Component
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
        $orders = Order::where('status','cancelled')->orderBy('order_cancel_datetime', 'desc')->skip($this->start)->take($this->perPage)->get();
        $this->total = Order::where('status','cancelled')->count();
        return view('livewire.backend.order.cancel-delivery-order',compact('orders'));
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

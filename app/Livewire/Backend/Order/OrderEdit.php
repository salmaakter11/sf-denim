<?php

namespace App\Livewire\Backend\Order;

use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

class OrderEdit extends Component
{
    public $id;
    #[Rule('required|max:250')]
    public $name;
    #[Rule('required|max:250')]
    public $phone;
    #[Rule('required|max:250')]
    public $address;
    #[Rule('required|max:250')]
    public $note;
    #[Rule('nullable|min:0|max:1000')]
    public $deliverycharge;
    public $carts;
    public function mount(int $id){
        $this->id = $id;
        $order = Order::findOrFail($id);
        $this->name = $order->name;
        $this->phone = $order->phone;
        $this->address = $order->address;
        $this->note = $order->note;
        $this->carts = $order->cart;
        $this->deliverycharge = $order->deliverycharge;
        Cart::destroy();
        foreach(unserialize($order->cart) as $cart){
            Cart::add([
                'id' => $cart->id,
                'name' =>$cart->name,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'weight' => 1,
                'options' => [
                    'image' => $cart->options->image,
                    'discount' =>   $cart->options->discount,
                    'code' =>   $cart->options->code,
                    'name_bn' =>  $cart->options->name_bn,
                ],
            ]);
        }
    }
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.backend.order.order-edit');
    }
    public function update(){
        $validated = $this->validate();
        $order = Order::findOrFail($this->id);

        $order->update([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'note' =>  $validated['note'],
            'total' => round(floatval(Cart::subtotal())),
            'deliverycharge' => $validated['deliverycharge'],
            'cart' => serialize(Cart::content()),
            'order_place_datetime' => date('d-m-y h:i:s'),
        ]);
        $this->id='';
        session()->flash('order_index', 'order updated successfully.');
        $notification = array(
            'message' => 'order updated successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('pending.index')->with($notification); 
}
public function incriment($rowid)
    {
        $row = Cart::get($rowid);
        Cart::update($rowid, $row->qty + 1);
        $this->carts= serialize(Cart::content());
    }
    public function decriment($rowid)
    { 
        $row = Cart::get($rowid);
        if($row->qty>1){
            Cart::update($rowid, $row->qty - 1);
        }
        $this->carts= serialize(Cart::content());
    }
    public function remove($rowid){
        Cart::remove($rowid);
        $this->carts= serialize(Cart::content());
    }
}

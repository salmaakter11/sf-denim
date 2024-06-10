<?php

namespace App\Livewire\Frontend;

use Livewire\Attributes\Rule;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
class Showmap extends Component
{

    #[Rule('nullable')]
    public $additional_user_location;


    public function render()
    {
        return view('livewire.frontend.showmap');
    }

    public function set_user_given_location()
    {
        if ($this->additional_user_location != null) {
            session()->get('user_given_location');
            session()->forget('user_given_location');
            Session::put('user_given_location',$this->additional_user_location); 
            $googleAddress= session()->get('google_given_address');
            $this->js("document.getElementById('customer_address').innerHTML = `$googleAddress( $this->additional_user_location )`;");
            Cart::destroy();
            return to_route('welcome')->with('message', 'Location set Successfully.');         
        }
    }
}

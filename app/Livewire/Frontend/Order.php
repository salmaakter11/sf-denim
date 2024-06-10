<?php

namespace App\Livewire\Frontend;

use App\Models\Order as ModelsOrder;
use App\Models\OrderCart;
use App\Models\Restaurant;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class Order extends Component
{

    public $cartQty;
    public $cartTotal;
    public $tax;
    public $subtotal;
    public $priceTotal;
    public $save;
    public $restaurant;
    public $restaurant_id;



    #[Validate('regex:/\+8801[0-9]{9}/', message: 'The phone field format is invalid. Valid format: +8801[9 digit]')]
    #[Validate('required', message: 'Please provide your active phome number')]
    #[Validate('min:13', message: 'This phone you gave is too short')]
    #[Validate('max:17', message: 'This phone you gave is too large')]
    public $order_phone;


    public function mount(){
        $user = User::find(Auth::id());
        if( $user ){
            $this->order_phone =$user->phone;
        }
        $carts = Cart::content();
    	$this->cartQty = Cart::count();
        $this->tax= round(Cart::tax());
        $this->subtotal = Cart::subtotal();
        $this->priceTotal = Cart::priceTotal();
        $cartTotal = Cart::total();
        $this->cartTotal = round(floatval($cartTotal));
        $this->save = $this->priceTotal - $this->subtotal;
        $restaurantId = Session::get('restaurant.id');
        $this->restaurant_id = $restaurantId;
        $this->restaurant = Restaurant::find($restaurantId);
    }
    #[On("orderpage")]
    public function render()
    {

        $user = User::find(Auth::id());
        $carts = Cart::content();
        $this->mount();
        return view('livewire.frontend.order',[
            'carts' => $carts,
    		'cartQty' => $this->cartQty,
    		'cartTotal' => $this->cartTotal,
            'tax'=> round($this->tax),
            'subtotal' => $this->subtotal,
            'priceTotal'=>  $this->priceTotal,
            'save'=> $this->save,
            'restaurant'=>$this->restaurant,
            'user' =>  $user,
          
        ]);
    }
    public function order(){
        $validated = $this->validate();
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-y h:i:s');
        $order = ModelsOrder::insertGetId([
            'user_id' =>Auth::id(),
            'order_phone' => $validated['order_phone'],
            'user_given_address'=>session()->get('user_given_location'),
            'user_google_address'=> session()->get('google_given_address'),
            'user_google_longitude'=> session()->get('google_given_longitude'),
            'user_google_latitude'=> session()->get('google_given_latitude'),
            'restaurant_id'=> $this->restaurant_id,
            'total'=> $this->cartTotal,
            'order_place_datetime'=> $date,
            'status'=>'pending_order',
            'created_at'=>now(),
        ]);
        OrderCart::create([
            'order_id' => $order,
            'content' => serialize(Cart::content()),
        ]);

        $this->reset(
            "order_phone",
        );
        //will redirect to user order list page  

        Cart::destroy();
        return to_route('user.order')->with('message', 'Order placed Successfully.');
       
    }
}

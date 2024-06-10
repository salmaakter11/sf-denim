<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RestaurantController extends Controller
{
    public function Index($id, $name){
        $data['restaurant'] = Restaurant::findOrFail($id);
        if( Session::has('restaurant')){
            if( Session::get('restaurant.id')!=$id){
                Cart::destroy();
            }
        }else{
            session()->forget('restaurant');
            Session::put('restaurant',['id'=>$id,'name'=>$name,]);
        }
        
        return view('frontend.restaurant.index')->with($data);
    }
}

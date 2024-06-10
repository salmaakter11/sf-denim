<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderList extends Controller
{
    public function OrderListIndex()
    {       
        $active_order =  Order::where('user_id', Auth::id())->with('restaurant', 'carts')
        ->where('status','!=','delivered_by_rider')
        ->where('status','!=','pending_order')
        ->where('status','!=','cancel_by_restaurant')->get();
        $active_order_ids = $active_order->pluck('id')->toArray();
        $pending_list = Order::where('user_id', Auth::id())->with('restaurant', 'carts')->where('status','pending_order')->get();
        $pending_list_ids = $pending_list->pluck('id')->toArray();
        $order_list = Order::where('user_id', Auth::id())->with('restaurant', 'carts')
        ->whereNotIn('id', $active_order_ids)
        ->whereNotIn('id', $pending_list_ids)
        ->get();

        $pending_list = Order::where('user_id', Auth::id())->with('restaurant', 'carts')->where('status','pending_order')->get();
        return view('frontend.order.order_list', compact('order_list','active_order','pending_list'));
    }
}

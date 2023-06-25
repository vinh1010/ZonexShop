<?php

namespace App\Http\Controllers\frontend;

use App\Helper\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\frontend\CheckOutRequest;
use App\Mail\OrderShipped;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{

    public function cart(Cart $cart, Request $request, Product $product, ProductAttribute $productAttribute){
        $cart->add($product,$request,$productAttribute);
        return redirect()->back()->with('add_card','Product add to cart successfully');
    }

    public function show_cart(Cart $cart){
        $get_cart = $cart->items;
        $total_price = $cart->total_price();
        return view('frontend.pages.showCart',compact('get_cart','total_price'));
    }

    public function update_all(Cart $cart, Request $request){
        $request = $request->except('_token');
        $cart->update_all($request);
        return redirect()->route('show_cart');
    }

    public function delete($id, Cart $cart){
        $cart->delete($id);
        return redirect()->back();
    }

    public function check_out(Cart $cart){
        $get_cart = $cart->items;
        $total_price = $cart->total_price();
        return view('frontend.pages.checkOut',compact('get_cart','total_price'));
    }

    public function post_checkOut(CheckOutRequest $request, Cart $cart, Order $order, OrderDetail $orderDetail){
        $order = $order->add_order($request);
        $order_id = $order->id;
        $orderDetail->add($cart,$order_id);
        // Mail::to($request->email)->send(new OrderShipped);
        session(['order'=>$order]);
        session()->forget('cart');
        return redirect()->route('thank_order');
    }

    public function thank_order(OrderDetail $orderDetail){
        $order = Session::get('order');
        $orderDetail = $orderDetail->find($order->id);
        return view('frontend.pages.orderComplete',compact('order','orderDetail'));
    }

    public function list_order(Order $order){
        if(Session::has('error')){
            Alert::error('', Session::get('error'));
        }
        if(Session::has('success')){
            Alert::success('', Session::get('success'));
        }
        $user_id = 0;
        if(Auth::check()){
            $user_id = Auth::user()->id;
        }
        else{
            $user_id = 0;
        }
        $list_order = $order->get_order($user_id);
        $history_order = $order->get_history_order($user_id);
        return view('frontend.pages.listOrder',compact('list_order','history_order'));
    }

    public function order_detail($id,OrderDetail $orderDetail,Order $order){
        $orderDetail = $orderDetail->order_detail($id);
        return view('frontend.pages.orderDetail',compact('order','orderDetail'));
    }

    public function cancel_order($id, Order $order){
        $find_order = $order->find($id);
        foreach($find_order as $vale){
            if($vale->status > 2){
                return redirect()->back()->with('error','Can Not Cancel Order');
            }
            else{
                $order->cancel($id);
                return redirect()->back()->with('success','Cancel Order Successfully');
            }
        }
    }
}

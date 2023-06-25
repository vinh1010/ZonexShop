<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function admin(User $user, Order $order, Category $category, Brand $brand, Product $product){
        $time = getdate();
        $year = $time['year'];
        $month = $time['mon'];
        if($month == 2){
            $start = $year.'-'.$month.'-'.'01';
            $end = $year.'-'.$month.'-'.'29';
        }
        if($month == 4 || $month == 6 || $month == 9 || $month == 11){
            $start = $year.'-'.$month.'-'.'01';
            $end = $year.'-'.$month.'-'.'30';
        }
        else{
            $start = $year.'-'.$month.'-'.'01';
            $end = $year.'-'.$month.'-'.'31';
        }
        $total_in_month = 0;
        $total_in_year = 0;
        $start_year = $year.'-'.'01'.'-'.'01';
        $end_year = $year.'-'.'12'.'-'.'31';
        $sale_pro = $order->get_seling_pro()->whereBetween('orders.created_at',[$start , $end])
        ->where('orders.status',4)
        ->orderByDesc('quantity')->take(5)->get();
        $my_order_in_month = $order->order_in_month($start,$end)->get();
        $my_order_in_year = $order->order_in_year($start_year,$end_year)->get();
        foreach ($my_order_in_month as $key => $value) {
            $total_in_month += $value->total_price;
        }
        foreach ($my_order_in_year as $key => $value) {
            $total_in_year += $value->total_price;
        }
        
        $user = $user->get_user()->count();
        $order_for_confirmation = $order->get_order_wait_for_confirmation()->paginate(5);
        $order_complate = $order->get_order_complate()->count();
        $list_order_month = $order->order_in_month($start,$end_year)->paginate(5);
        $category = $category->list_category();
        $brand = $brand->list_brand();
        $product = $product->product_count();
        return view('backend.pages.dashboard',compact('user','order_for_confirmation','order_complate','category','brand','total_in_year',
        'product','total_in_month','month','year','list_order_month','sale_pro','order'));
    }

    public function login(){
        return view('backend.pages.login');
    }

    public function post_login(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect()->route('admin');
        }
        else{
            return redirect()->route('admin.login')->withError('Email or Password does not exist');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function list_user(){
        $list_user = User::where('role',0)->paginate(10);
        return view('backend.pages.listUser',compact('list_user'));
    }
}

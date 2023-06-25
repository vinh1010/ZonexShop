<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderManagementController extends Controller
{
    public function list_order(Order $order, Request $request){
        $list_order = $order->get_all($request);
        return view('backend.pages.order.orderManagement',compact('list_order'));
    }

    public function detail_order($id, OrderDetail $orderDetail){
        $order = Order::find($id);
        $orderDetail = $orderDetail->find($id);
        return view('backend.pages.order.orderDetail',compact('order','orderDetail'));
    }

    public function update_status($id, Request $request, Order $order){
        $id = $request->id;
        $find = $order->find($id);
        if($find->status == 5 || $find->status == 4){
            return redirect()->back()->withError('Can not update canceled and accomplished order');
        }
        else{
            if($request->value){
                $order->update_status($id,$request);
                return redirect()->back()->withSuccess('Update Status Success');
            } 
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = ['name','order_id','product_id','price','quantity','color','size'];
    use HasFactory;

     // Lấy tất cả sản phẩm
     public function product(){
        return $this->belongsTo('App\Models\Product','product_id','id');
    }

    // Hàm kiểm tra sản phẩm
    public function check_product($product_id){
        return OrderDetail::join('orders','orders.id','=','order_details.order_id')
        ->where('orders.status','<',4)->where('order_details.product_id',$product_id)->get();
    }

    // Thêm mới order detail
    public function add($cart,$order_id){
        foreach($cart->items as $value){
            $order_detail = OrderDetail::create([
                'order_id' => $order_id,
                'product_id' => $value['id'],
                'price' => $value['price'],
                'quantity' => $value['quantity'],
                'color' => $value['color'],
                'size' => $value['size']
            ]);
        }
    }

    // Lấy order detail theo order_id
    public function find($order_id){
        return OrderDetail::where('order_id',$order_id)->get();
    }

    public function order_detail($id){
        return OrderDetail::select('*','orders.total_price','orders.address_ship','orders.phone','orders.note')->join('orders','orders.id','order_details.order_id')
        ->where('order_id',$id)->get();
    }
}

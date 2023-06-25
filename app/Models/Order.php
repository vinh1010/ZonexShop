<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $fillable = ['user_id','total_price','address_ship','phone','note'];
    use HasFactory;

    public function get_all($request){
        if($request->key){
            $keyword = $request->key;
            if($request->find_by){
                switch($request->find_by){
                    case 'wait':
                        $order_key = Order::select('orders.*','users.name')->join('users','orders.user_id','users.id')
                        ->where('users.name','like','%'.$keyword.'%')->where('orders.status',1)->orderBy('orders.created_at','DESC');
                    break;
                    case 'confirmed':
                        $order_key = Order::select('orders.*','users.name')->join('users','orders.user_id','users.id')
                        ->where('users.name','like','%'.$keyword.'%')->where('orders.status',2)->orderBy('orders.created_at','DESC');
                    break;
                    case 'delivery':
                        $order_key = Order::select('orders.*','users.name')->join('users','orders.user_id','users.id')
                        ->where('users.name','like','%'.$keyword.'%')->where('orders.status',3)->orderBy('orders.created_at','DESC');
                    break;
                    case 'completed':
                        $order_key = Order::select('orders.*','users.name')->join('users','orders.user_id','users.id')
                        ->where('users.name','like','%'.$keyword.'%')->where('orders.status',4)->orderBy('orders.created_at','DESC');
                    break;
                    case 'canceled':
                        $order_key = Order::select('orders.*','users.name')->join('users','orders.user_id','users.id')
                        ->where('users.name','like','%'.$keyword.'%')->where('orders.status',5)->orderBy('orders.created_at','DESC');
                    break;
                    default: 
                        $order_key = Order::select('orders.*','users.name')->join('users','orders.user_id','users.id')
                        ->where('users.name','like','%'.$keyword.'%')->orderBy('orders.created_at','DESC');
                    break;
                }
            }
            else{
                $order_key = Order::select('orders.*','users.name')->join('users','orders.user_id','users.id')
                ->where('users.name','like','%'.$keyword.'%')->orderBy('orders.created_at','DESC');
            }
        }
        else{
            if($request->start){
                $start = $request->start;
                $end = $request->end;
                if($request->find_by){
                    switch($request->find_by){
                        case 'wait':
                            $order_key = Order::select('orders.*')
                            ->whereBetween('created_at',[$start , $end])->where('orders.status',1)->orderBy('orders.created_at','DESC');
                        break;
                        case 'confirmed':
                            $order_key = Order::select('orders.*')
                            ->whereBetween('created_at',[$start , $end])->where('orders.status',2)->orderBy('orders.created_at','DESC');
                        break;
                        case 'delivery':
                            $order_key = Order::select('orders.*')
                            ->whereBetween('created_at',[$start , $end])->where('orders.status',3)->orderBy('orders.created_at','DESC');
                        break;
                        case 'completed':
                            $order_key = Order::select('orders.*')
                            ->whereBetween('created_at',[$start , $end])->where('orders.status',4)->orderBy('orders.created_at','DESC');
                        break;
                        case 'canceled':
                            $order_key = Order::select('orders.*')
                            ->whereBetween('created_at',[$start , $end])->where('orders.status',5)->orderBy('orders.created_at','DESC');
                        break;
                        default: 
                            $order_key = Order::select('orders.*')
                            ->whereBetween('created_at',[$start , $end])->orderBy('orders.created_at','DESC');
                        break;
                    }
                }
                else{
                    $order_key = Order::select('orders.*')->whereBetween('created_at',[$start , $end]);
                }
            }
            else{
                if($request->find_by){
                    switch($request->find_by){
                        case 'wait':
                            $order_key = Order::select('orders.*')->where('orders.status','=',1)->orderBy('orders.created_at','DESC');
                        break;
                        case 'confirmed':
                            $order_key = Order::select('orders.*')->where('orders.status','=',2)->orderBy('orders.created_at','DESC');
                        break;
                        case 'delivery':
                            $order_key = Order::select('orders.*')->where('orders.status','=',3)->orderBy('orders.created_at','DESC');
                        break;
                        case 'completed':
                            $order_key = Order::select('orders.*')->where('orders.status','=',4)->orderBy('orders.created_at','DESC');
                        break;
                        case 'canceled':
                            $order_key = Order::select('orders.*')->where('orders.status','=',5)->orderBy('orders.created_at','DESC');
                        break;
                        default: 
                            $order_key = Order::select('orders.*')->orderBy('orders.created_at','DESC');
                        break;
                    }
                }
                else{
                    $order_key = Order::select('orders.*')->orderBy('created_at','DESC');
                }
            }   
        }
        return $order_key->paginate(5);
    }

    public function add_order($request){
        $orders = Order::create([
            'user_id'=>Auth::user()->id,
            'total_price'=>$request->total_price,
            'address_ship'=>$request->address_ship,
            'phone'=>$request->phone,
            'note'=>$request->note
        ]);
        return $orders;
    }

    public static function find($id){
        return Order::where('id',$id)->first();
    }

    public function cancel($id){
        Order::where('id',$id)->update(['status'=>5]);
    }

    public  function update_status($id,$request){
        Order::where('id',$id)->update(['status'=>$request->value]);
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function get_order($user_id){
        return Order::where('user_id',$user_id)->where('status','!=',4)->where('status','!=',5)->orderby('created_at','DESC')->get();
    }

    public function get_history_order($user_id){
        return Order::where('user_id',$user_id)->where('status','=',4)->orWhere('status','=',5)->orderby('created_at','DESC')->get();
    }

    public function get_order_wait_for_confirmation(){
        return Order::where('status',1)->orderby('created_at','DESC');
    }
    public function get_order_complate(){
        return Order::where('status','=',4)->get();
    }

    public function order_in_month($start ,$end){
        return Order::where('status',4)->whereBetween('created_at',[$start , $end]);
    }

    public function order_in_year($start_year,$end_year){
        return Order::where('status',4)->whereBetween('created_at',[$start_year , $end_year]);
    }

    public function get_image($id){
        return Product::where('id',$id)->first();
    }

    public function get_seling_pro(){
        return DB::table('orders')->select('order_details.product_id',DB::raw('sum(order_details.quantity) as quantity')
        )->leftJoin('order_details', 'orders.id', '=', 'order_details.order_id')
        ->join('products', 'products.id', '=', 'order_details.product_id')
        ->groupBy('order_details.product_id');
    }
}

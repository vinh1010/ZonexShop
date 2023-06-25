<?php

namespace App\Helper;

use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class Cart {
    public $items = [];
    public $total_price = 0;
    public $total_quantity = 0;

    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
    }

    // Kiểm tra sản  phẩm đã tồn tại trong  giỏ hàng hay chưa
   
    public function check_pro($product,$color,$size){
        foreach($this->items as $key2 => $value){ 
            if($product->id == $value['id'] && $color == $value['color'] && $size == $value['size']){
                return $key2;
            }  
        }
        return false;
    }

    public function check_update($product,$color){
        foreach($this->items as $key => $value){
            if($product->id == $value['id'] && $color == $value['color']){
                return $color;
            }
        }
        return false;
    }

    // Thêm mới sản phẩm vào giỏ hàng
    public function add($product,$request){
        $id = $request->id;
        $color = $request->color;
        $size = $request->size;
        $quantity = $request->quantity;
        
        $product = $product->find_product($id);

        $item = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => ($product->sale_price > 0) ? $product->sale_price : $product->price,
            'image' => $product->image,
            'quantity' => $quantity,
            'size' => $size,
            'color' => $color,
            'product' => $product
        ];

        // Sử dụng hàm kiểm tra để thêm mới sản phẩm
        $check = $this->check_pro($product,$color,$size);

        if(!$check){
            // Nếu sản phẩm chưa tồn tạo tiến hành thêm mới
            $this->items[$product->id.$color.$size] = $item;
        }
        else{
            // Nếu có rồi cập nhật số lượng sản phẩm thêm 1
            $this->items[$check]['quantity'] += $quantity;
        }   
        session(['cart'=>$this->items]);

    }

    public function update_all($request){
        $id = $request['id'];
        $checkk = false;
        foreach($this->items as $key => $value){
            if($request['product_id'] == $value['id'] && $request['color'] == $value['color'] && $request['size'] == $value['size'] && $key!=$request['id']){
                $checkk = $key;
            }
        } 
        if(!$checkk){
            
            $this->items[$id]['quantity'] = $request['quantity'];
            $this->items[$id]['color'] = $request['color'];
            $this->items[$id]['size'] = $request['size'];
        }
        else{
            $quantity = $this->items[$id]['quantity'] + $request['quantity'];
           
            unset($this->items[$checkk]);
            $this->items[$id]['quantity'] = $quantity;
            $this->items[$id]['color'] = $request['color'];
            $this->items[$id]['size'] = $request['size'];
        }
        session(['cart'=>$this->items]);
    }

    public function delete($id){
        unset($this->items[$id]);
        session(['cart'=>$this->items]);
    }

    public function total_price(){
        $total_price = 0;
        foreach($this->items as $value){
            $total_price += $value['quantity']*$value['price'];
        }
        return $total_price;
    }

    public function count_cart(){
        $count = 0;
        foreach($this->items as $value){
            $count ++;
        }
        return $count;
    }
}
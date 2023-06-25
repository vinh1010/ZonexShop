<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $table = 'product_attributes';
    protected $fillable = ['product_id','attribute_id'];
    use HasFactory;

    // Lấy tất cả thuộc tính
    public function attribute(){
        return $this->belongsTo('App\Models\Attribute','attribute_id','id');
    }    

    // Thêm mới thuộc tính sản phẩm
    public function add_productAttribute($id_product,$request){
        $attributes = $request['attributes']; 
        foreach($attributes as $value){
            ProductAttribute::create([
                'product_id' => $id_product,
                'attribute_id' => $value
            ]);
        }
    }

    // Tìm thuộc tính sản phẩm theo id
    public function find_productAttribute($id){
        return ProductAttribute::where('product_id',$id)->get();
    }

    // Cập nhật thuộc tính sản phẩm
    public function update_productAttribute($id,$request){
       $attributes = $request['attributes'];
       if($attributes){
            ProductAttribute::where('product_id',$id)->delete();
            foreach($attributes as $value){
                ProductAttribute::create([
                    'product_id' => $id,
                    'attribute_id' => $value
                ]);
            }
       }
    }

    // Xóa thuộc tính sản phẩm
    public function delete_productAttribute($id){
        ProductAttribute::where('product_id',$id)->delete();
    }

    // Lấy màu theo id sản phẩm
    public function get_color($id){
        return ProductAttribute::JOIN('attributes','attributes.id','=','product_attributes.attribute_id')
        ->where('attributes.attribute',0)->where('product_id',$id)->get();
    }

    public function get_size($id){
        return ProductAttribute::JOIN('attributes','attributes.id','=','product_attributes.attribute_id')
        ->where('attributes.attribute',1)->where('product_id',$id)->get();
    }
}

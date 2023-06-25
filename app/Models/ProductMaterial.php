<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMaterial extends Model
{
    protected $fillable = ['product_id','material_id'];
    use HasFactory;

    // Lấy tất cả chất liệu
    public function material(){
        return $this->belongsTo('App\Models\Material','material_id','id');
    }    

    // Thêm mới chất liệu sản phẩm
    public function add_productMaterial($id_product,$request){
        $material = $request['material']; 
        foreach($material as $value){
            ProductMaterial::create([
                'product_id' => $id_product,
                'material_id' => $value
            ]);
        }
    }

    // Tìm chất liệu sản phẩm theo id
    public function find_productMaterial($id){
        return ProductMaterial::where('product_id',$id)->get();
    }

    // Cập nhật chất liệu sản phẩm
    public function update_productMaterial($id,$request){
       $material = $request['material'];
       if($material){
        ProductMaterial::where('product_id',$id)->delete();
            foreach($material as $value){
                ProductMaterial::create([
                    'product_id' => $id,
                    'material_id' => $value
                ]);
            }
       }
    }

    // Xóa chất liệu sản phẩm
    public function delete_productMaterial($id){
        ProductMaterial::where('product_id',$id)->delete();
    }

    // Lấy chất liệu theo id sản phẩm
    public function get_material($id){
        return ProductMaterial::select('product_materials.*','materials.name')->join('materials','product_materials.material_id','materials.id')
        ->where('product_materials.product_id',$id)->get();
    }

    public function count_pro($id){
        return ProductMaterial::where('material_id',$id)->get()->count();
    }
}

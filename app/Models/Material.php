<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = ['name','status'];
    use HasFactory;

    // Hàm kiểm tra chất liệu sản phẩm sản phẩm
    public function check_material($id){
        return Material::join('product_materials','product_materials.material_id','materials.id')
        ->where('product_materials.material_id',$id)->get();
    }

    // Lấy tất cả chất liệu
    public function list_material(){
        return Material::all()->where('status',1);
    }

    // Thêm mới chất liệu
    public function add_material($request){
        Material::create($request->all());
    }

    // Tìm chất liệu theo id
    public function find_material($id){
        return Material::find($id);
    }

    // Cập nhật chất liệu
    public function update_material($id,$request){
        Material::find($id)->update($request->all());
    }

    // Xóa chất liệu
    public function delete_material($id){
        Material::destroy($id);
    }

    // Lấy chất liệu phân trang + tìm kiếm
    public function list_mate($request){
        $keyword = $request->key;
        $material_key = Material::query();
        if($keyword){
            $material_key->where('status',1)->where('name','like','%'.$keyword.'%')->orderBy('created_at','DESC');
        }
        else{
            $material_key->where('status',1)->orderBy('created_at','DESC');
        }
        return $material_key->paginate(10);
    }
}

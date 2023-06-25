<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = ['attribute','name','value','status'];
    use HasFactory;

    // Hàm kiểm tra thuộc tính sản phẩm
    public  function check_attr($id){
        return Attribute::join('product_attributes','product_attributes.attribute_id','attributes.id')
        ->where('product_attributes.attribute_id',$id)->get();
    }

    // Lấy tất cả thuộc tính
    public function list_attribute(){
        return Attribute::where('status',1)->orderBy('attribute','ASC')->get();
    }

    // Lấy tất cả màu sắc
    public function list_color(){
        return Attribute::all()->where('attribute',0);
    }

    // Lấy tất cả size
    public function list_size(){
        return Attribute::all()->where('attribute',1);
    }

    // Thêm mới thuộc tính
    public function add_attribute($request){
        Attribute::create($request->all());
    }

    // Tìm thuộc tính theo id
    public function find_attribute($id){
        return Attribute::find($id);
    }

    // Cập nhật thuộc tính
    public function update_attribute($id,$request){
        Attribute::find($id)->update($request->all());
    }

    // Xóa thuộc tính
    public function delete_attribute($id){
        Attribute::destroy($id);
    }

    // Lấy thuộc tính phân trang + tìm kiếm
    public function list_Attr($request){
        $keyword = $request->key;
        $attr_key = Attribute::query();
        if($keyword){
            $attr_key->where('status',1)->where('name','like','%'.$keyword.'%')->orderBy('created_at','DESC');
        }
        else{
            $attr_key->where('status',1)->orderBy('created_at','DESC');
        }
        return $attr_key->paginate(10);
    }
}

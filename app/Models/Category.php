<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','status','parent_id'];
    use HasFactory;

    // Hàm hiểm tra danh mục con
    public function check_parent($id){
        return Category::where('parent_id',$id)->get();
    }

    // Lấy tất cả danh mục
    public function list_category(){
        return Category::all()->where('status',1);
    }

    // Lấy tất cả danh mục cha
    public function big_catalog(){
        return Category::all()->where('parent_id',0)->where('status',1);
    }

    public function small_catalog(){
        return Category::all()->where('parent_id','!=',0)->where('status',1);
    }

    // Thêm mới danh mục
    public function add_category($request){
        Category::create($request->all());
    }

    // Tìm danh mục theo id
    public function find_category($id){
        return Category::find($id);
    }

    // Cập nhật danh mục
    public function update_category($id,$request){
        Category::find($id)->update($request->all());
    }

    // Xóa danh mục
    public function delete_category($id){
        Category::destroy($id);
    }

    // Đếm số lượng sản phẩm trên danh mục
    public function product(){
        return $this->hasMany(Product::class);
    }

    // Lấy danh mục phân trang + tìm kiếm
    public function list_Cate($request){
        $keyword = $request->key;
        $category_key = Category::query();
        if($keyword){
            $category_key->where('status',1)->where('name','like','%'.$keyword.'%')->orderBy('created_at','DESC');
        }
        else{
            $category_key->where('status',1)->orderBy('created_at','DESC');
        }
        return $category_key->paginate(10);
    }

}

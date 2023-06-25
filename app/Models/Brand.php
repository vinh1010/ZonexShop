<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name','logo','status'];
    use HasFactory;

    // Lấy tất cả nhãn hàng
    public function list_brand(){
        return Brand::all()->where('status',1);
    }

    // Thêm mới nhãn hàng
    public function add_brand($request){
        $file = $request->logo;
        $name = $file->getClientOriginalName();
        $file->move(base_path('public/images/brands'),$name);
        Brand::create([
            'name' => $request->name,
            'logo' => $name,
            'status' => $request->status
        ]);
    }

    // Tìm nhãn hàng theo id
    public function find_brand($id){
        return Brand::find($id);
    }

    // Cập nhật nhãn hàng
    public function update_brand($id,$request){
        $logo = Brand::find($id)->logo;
        $brand = Brand::find($id);
        if($request->logo){
            $file = $request->logo;
            $name = $file->getClientOriginalName();
            $file->move(base_path('public/images/brands'),$name);
            unlink('images/brands/'.$logo);
        }
        else{
            $name = $brand->logo;
        }
        Brand::find($id)->update([
            'name' => $request->name,
            'logo' => $name,
            'status' => $request->status
        ]);
    }

    // Xóa nhãn hàng
    public function delete_brand($id){
        $logo = Brand::find($id)->logo;
        unlink('images/brands/'.$logo);
        Brand::destroy($id);
    }

    // Đếm số lượng sản phẩm trên danh mục
    public function product(){
        return $this->hasMany(Product::class);
    }

    // Lấy nhãn hàng phân trang + tìm kiếm
    public function list_br($request){
        $keyword = $request->key;
        $brand_key = Brand::query();
        if($keyword){
            $brand_key->where('status',1)->where('name','like','%'.$keyword.'%')->orderBy('created_at','DESC');
        }
        else{
            $brand_key->where('status',1)->orderBy('created_at','DESC');
        }
        return $brand_key->paginate(5);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['category_id','name','image','status','position'];
    use HasFactory;

    // Lấy tất cả danh mục
        public function category(){
        return $this->belongsTo('App\Models\Category','category_id','id');
    }

    // Lấy tất cả banner
    public function list_banner(){
        return Banner::all()->where('status',1);
    }

    // Hàm kiểm tra danh mục
    public function check_cate($id){
        return Banner::where('category_id',$id);
    }

    // Thêm mới banner
    public function add_banner($request){
        $file = $request->image;
        $name = $file->getClientOriginalName();
        $file->move(base_path('public/images/banners'),$name);
        Banner::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'image' => $name,
            'position' =>$request->position,
            'status' => $request->status
        ]);
    }

    // Tìm banner theo id
    public function find_banner($id){
        return Banner::find($id);
    }

    // Cập nhật banner
    public function update_banner($id,$request){
        $image = Banner::find($id)->image;
        $banner = Banner::find($id);
        if($request->image){
            $file = $request->image;
            $name = $file->getClientOriginalName();
            $file->move(base_path('public/images/banners'),$name);
            // unlink('images/banners/'.$image);
        }
        else{
            $name = $banner->image;
        }
        Banner::find($id)->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'image' => $name,
            'position' =>$request->position,
            'status' => $request->status
        ]);
    }

    // Xoá banner
    public function delete_banner($id){
        $image = Banner::find($id)->image;
        unlink('images/banners/'.$image);
        Banner::destroy($id);
    }
}

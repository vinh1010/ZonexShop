<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteProduct extends Model
{
    protected $fillable = ['product_id','user_id'];
    use HasFactory;

    public function product(){
        return $this->belongsTo('App\Models\Product','product_id','id');
    }

    // Thêm mới sản phẩm yêu thích
    public function add_favorite($product_id,$user_id){
        FavoriteProduct::create([
            'product_id' => $product_id,
            'user_id' => $user_id, 
        ]);
    }

    // Tìm sản phẩm yêu thích theo id
    public function find_favorite($id,$user_id){
        return FavoriteProduct::where('product_id',$id)->where('user_id',$user_id)->get();
    }

    // Danh sách sản phẩm yêu thích
    public function list_favorite(){
        return FavoriteProduct::all();
    }

    // Xóa sản phẩm yêu thích
    public function delete_favorite($id){
        FavoriteProduct::destroy($id);
    }

}

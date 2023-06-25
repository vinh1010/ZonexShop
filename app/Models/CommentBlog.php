<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentBlog extends Model
{
    protected $fillable = ['blog_id','user_id','content','status'];
    use HasFactory;

    // Lấy user
    public function get_user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    // Lấy tất cả comment theo id blog
    public function list_comment($id){
        return CommentBlog::where('blog_id', $id)->get();
    }
    public function get_cmt_home(){
        return CommentBlog::orderBy('created_at','desc')->limit(8)->get();
    }
    // Thêm mới bình luận tin tức 
    public function add($request){
        CommentBlog::create([
            'blog_id'=>$request->blog_id,
            'user_id'=>$request->user_id,
            'content'=>$request->content,
            'status'=>0,
        ]);
    }  
}

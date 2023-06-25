<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['category_id','image','title','summary','content','status'];
    use HasFactory;

    // Hàm kiểm tra danh mục
    public function check_cate($id){
        return Blog::where('category_id',$id);
    }

    // Lấy tất cả danh mục
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id','id');
    }

    // Lấy tất cả tin tức
    public function list_blog(){
        return Blog::where('status',1)->paginate(6);
    }

    // Thêm mói tin tức
    public function add_blog($request){
        $file = $request->image;
        $name = $file->getClientOriginalName();
        $file->move(base_path('public/images/blogs'),$name);
        Blog::create([
            'category_id' => $request->category_id,
            'image' => $name,
            'title' => $request->title,
            'summary' => $request->summary,
            'content' => $request->content,
            'status' => $request->status
        ]);
    }

    // Tìm tin tức theo id
    public function find_blog($id){
        return Blog::find($id);
    }

    // Cập nhật tin tức
    public function update_blog($id,$request){
        $image = Blog::find($id)->image;
        if($request->image){
            $file = $request->image;
            $name = $file->getClientOriginalName();
            $file->move(base_path('public/images/blogs'),$name);
            unlink('images/blogs/'.$image);
        }
        else{
            $name = $image;
        }
        Blog::find($id)->update([
            'category_id' => $request->category_id,
            'image' => $name,
            'title' => $request->title,
            'summary' => $request->summary,
            'content' => $request->content,
            'status' => $request->status
        ]);
    }

    // Xoá blog
    public function delete_blog($id){
        $image = Blog::find($id)->image;
        unlink('images/blogs/'.$image);
        Blog::destroy($id);
    }

    // Lấy blog phân trang + tìm kiếm
    public function list_blg($request){
        $keyword = $request->key;
        $blog_key = Blog::query();
        if($keyword){
            $blog_key->where('status',1)->where('title','like','%'.$keyword.'%')->orderBy('created_at','DESC');
        }
        else{
            $blog_key->where('status',1)->orderBy('created_at','DESC');
        }
        return $blog_key->paginate(5);
    }

    // Phân trang blog
    public function rerecentBlog(){
        return Blog::orderby('created_at','DESC')->limit(4)->get();
    }

    public function count_cmt($id){
        $count = CommentBlog::where('blog_id',$id)->get()->count();
        return $count;
    }

}

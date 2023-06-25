<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\CommentBlog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(Blog $blog){
        $blog = $blog->list_blog();
        return view('frontend.pages.blog',compact('blog'));
    }

    public function blog_detail($id, Blog $blog, Category $category, CommentBlog $commentBlog){
        $detail = $blog->find_blog($id);
        $cat = $category->list_category();
        $recentblog = $blog->rerecentBlog();
        $comment = $commentBlog->list_comment($id);
        return view('frontend.pages.blogdetail',compact('detail','cat','recentblog','comment'));
    }

    public function post_cmt(Request $request, CommentBlog $commentBlog){
        $commentBlog->add($request);
        return redirect()->back();
    }
}

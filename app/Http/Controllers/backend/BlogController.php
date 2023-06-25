<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogAddRequest;
use App\Http\Requests\Blog\BlogUpdateRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Blog $list_blog, Request $request)
    {
        $list_blog = $list_blog->list_blg($request);
        return view('backend.pages.blog.listBlog',compact('list_blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        $get_category = $category->list_category();
        return view('backend.pages.blog.addBlog',compact('get_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogAddRequest $request, Blog $add_blog)
    {
        $add_blog = $add_blog->add_blog($request);
        return redirect()->route('blog.index')->withSuccess('Create Blog success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Blog $find_blog, Category $category)
    {
        $get_category = $category->list_category();
        $find_blog = $find_blog->find_blog($id);
        return view('backend.pages.blog.editBlog',compact('get_category','find_blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogUpdateRequest $request, $id, Blog $update_blog)
    {
        $update_blog = $update_blog->update_blog($id,$request);
        return redirect()->route('blog.index')->withSuccess('Update Blog success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Blog $delete_blog)
    {
        $delete_blog->delete_blog($id);
        return redirect()->route('blog.index')->withSuccess('Delete Blog success');
    }
}

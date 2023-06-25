<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryAddRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category, Request $request)
    {
        $list_category = $category->list_Cate($request);
        return view('backend.pages.category.listCategory',compact('list_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        $get_big_catalog = $category->big_catalog();
        return view('backend.pages.category.addCategory',compact('get_big_catalog'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryAddRequest $request, Category $category)
    {
        $add_category = $category->add_category($request);
        return redirect()->route('category.index')->withSuccess('Create Category success');
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
    public function edit($id,Category $edit_category)
    {
        $get_big_catalog = $edit_category->big_catalog();   
        $find_category = $edit_category->find_category($id);
        return view('backend.pages.category.editCategory',compact('find_category','get_big_catalog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id, Category $update_category)
    {
        $update_category = $update_category->update_category($id,$request);
        return redirect()->route('category.index')->withSuccess('Update Category success'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Category $delete_category, Product  $product, Banner $banner, Blog $blog)
    {
        $check_product = $product->check_cate($id)->count();
        $check_parent = $delete_category->check_parent($id)->count();
        $check_banner = $banner->check_cate($id)->count();
        $check_blog = $blog->check_cate($id)->count();
        if($check_product > 0){
            return redirect()->route('category.index')->withError('Category contains products please delete products first'); 
        }
        if($check_parent > 0){
            return redirect()->route('category.index')->withError('Category exists subcategory please delete subcategory first'); 
        }
        if($check_banner > 0){
            return redirect()->route('category.index')->withError('Category contains banners please delete banners first'); 
        }
        if($check_blog > 0){
            return redirect()->route('category.index')->withError('Category contains blogs please delete blogs first'); 
        }
        $delete_category = $delete_category->delete_category($id);
        return redirect()->route('category.index')->withSuccess('Delete Category success'); 
    }
}

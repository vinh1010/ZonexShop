<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\BrandAddRequest;
use App\Http\Requests\Brand\BrandUpdateRequest;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Brand $list_brand, Request $request)
    {
        $list_brand = $list_brand->list_br($request);
        return view('backend.pages.brand.listBrand',compact('list_brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.brand.addBrand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandAddRequest $request, Brand $add_brand)
    {
        $add_brand = $add_brand->add_brand($request);
        return redirect()->route('brand.index')->withSuccess('Create Brand success');
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
    public function edit($id, Brand $find_brand)
    {
        $find_brand = $find_brand->find_brand($id);
        return view('backend.pages.brand.editBrand',compact('find_brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandUpdateRequest $request, $id, Brand $update_brand)
    {
        $update_brand = $update_brand->update_brand($id,$request);
        return redirect()->route('brand.index')->withSuccess('Update Brand success'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Brand $delete_brand, Product $product)
    {
        $check_product = $product->check_brand($id)->count();
        if($check_product > 0){
            return redirect()->route('brand.index')->withError('Brand contains products please delete products first');
        }
        $delete_brand = $delete_brand->delete_brand($id);
        return redirect()->route('brand.index')->withSuccess('Delete Brand success'); 
    }
}

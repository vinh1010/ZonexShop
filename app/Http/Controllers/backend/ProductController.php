<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductAddRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Material;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductMaterial;
use App\Models\RelatedImage;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $list_product, Request $request)
    {
        $list_product = $list_product->list_product($request);
        return view('backend.pages.product.listProduct',compact('list_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $list_category, Brand $list_brand, Attribute $attribute, Material $material)
    {
        $list_color = $attribute->list_color();
        $list_size = $attribute->list_size();
        $list_category = $list_category->small_catalog();
        $list_brand = $list_brand->list_brand();
        $list_material = $material->list_material();
        return view('backend.pages.product.addProduct',compact('list_category','list_brand','list_color','list_size','list_material'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductAddRequest $request, Product $add_product, RelatedImage $add_relatedImage, ProductAttribute $add_productAttribute, ProductMaterial $add_productMaterial)
    {
        $add_product = $add_product->add_product($request);
        $id_product = $add_product->id;
        $add_relatedImage->add_relatedImage($id_product,$request);
        $add_productAttribute->add_productAttribute($id_product,$request);
        $add_productMaterial->add_productMaterial($id_product,$request);
        return redirect()->route('product.index')->withSuccess('Create product success');
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
    public function edit($id, Product $find_product, Category $list_category,Brand $list_brand, Attribute $attribute, Material $material, ProductAttribute $productAttribute, RelatedImage $relatedImage, ProductMaterial $productMaterial)
    {
        $list_category = $list_category->small_catalog();
        $list_brand = $list_brand->list_brand();
        $list_color = $attribute->list_color();
        $list_size = $attribute->list_size();
        $list_material = $material->list_material();

        $find_product = $find_product->find_product($id);
        $find_productAttribute = $productAttribute->find_productAttribute($id)->pluck('attribute_id')->toArray();
        $find_productMaterial = $productMaterial->find_productMaterial($id)->pluck('material_id')->toArray();
        $find_relatedImage = $relatedImage->find_relatedImage($id);
        return view('backend.pages.product.editProduct',compact('list_category','list_brand','list_color','list_size','list_material',
        'find_product','find_productAttribute','find_relatedImage','find_productMaterial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id, ProductAttribute $productAttribute, RelatedImage $relatedImage, Product $update_product, ProductMaterial $update_productMaterial)
    {
        $update_product->update_product($id,$request);
        $relatedImage->update_relatedImage($id,$request);
        $productAttribute->update_productAttribute($id,$request);
        $update_productMaterial->update_productMaterial($id,$request);
        return redirect()->route('product.index')->withSuccess('Update product success'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Product $delete_product, RelatedImage $relatedImage, ProductAttribute $productAttribute, ProductMaterial $delete_productMaterial, OrderDetail $orderDetail)
    {
        $order = $orderDetail->check_product($id)->count();
        if($order > 0){
            return redirect()->back()->withError('The product has an order, please wait for the order to be completed');
        }
        else{
            $relatedImage->delete_relatedImage($id);
            $productAttribute->delete_productAttribute($id);
            $delete_productMaterial->delete_productMaterial($id);
            $delete_product->delete_product($id);
            return redirect()->back()->withSuccess('Delete product success');
        }  
    }
}

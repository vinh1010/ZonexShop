<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FavoriteProduct;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductMaterial;
use App\Models\RelatedImage;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class ProntendProductController extends Controller
{
    public function detail(Product $product, $id, RelatedImage $relatedImage, ProductAttribute $productAttribute, ProductMaterial $product_material , FavoriteProduct $favoriteProduct){
        if(Session::has('delete_success')){
            Alert::success('', Session::get('delete_success'));
        }
        if(Session::has('add_success')){
            Alert::success('', Session::get('add_success'));
        }
        if(Session::has('error')){
            Alert::error('', Session::get('error'));
        }
        if(Auth::check()){
            $user_id = Auth::user()->id;
        }
        else{
            $user_id = 0;
        }
        $relatedImage = $relatedImage->find_relatedImage($id);
        $get_color = $productAttribute->get_color($id);
        $get_size = $productAttribute->get_size($id);
        $get_material = $product_material->get_material($id);
        $product_detail = $product->find_product($id);
        $related_product = $product->related_product($product_detail->category_id,$product_detail->brand_id,$product_detail->id);

        $get_favorite = $favoriteProduct->find_favorite($id,$user_id);
        $id_favorite = $get_favorite->pluck('id');
        $avgStar = Rating::where('product_id','=',$id)->avg('star');
        $countStar = Rating::where('product_id','=',$id)->count();
        return view('frontend.pages.detail',compact('relatedImage','product_detail','related_product','get_color','get_size','get_favorite','id_favorite','avgStar','countStar','get_material','productAttribute','favoriteProduct','user_id'));
        
    }

    public function shop_all(Product $product, Request $request, FavoriteProduct $favoriteProduct, ProductAttribute $productAttribute){
        if(Session::has('delete_success')){
            Alert::success('', Session::get('delete_success'));
        }
        if(Session::has('add_success')){
            Alert::success('', Session::get('add_success'));
        }
        if(Session::has('error')){
            Alert::error('', Session::get('error'));
        }
        if(Session::has('add_card')){
            Alert::success('', Session::get('add_card'));
        }
        if(Auth::check()){
            $user_id = Auth::user()->id;
        }
        else{
            $user_id = 0;
        }
        $list_product = $product->shop_all($request)->paginate(16);
        return view('frontend.pages.shop',compact('list_product','user_id','favoriteProduct','productAttribute'));
    }

    public function category($id,Request $request, Product $product, FavoriteProduct $favoriteProduct, ProductAttribute $productAttribute){
        if(Session::has('delete_success')){
            Alert::success('', Session::get('delete_success'));
        }
        if(Session::has('add_success')){
            Alert::success('', Session::get('add_success'));
        }
        if(Session::has('error')){
            Alert::error('', Session::get('error'));
        }
        if(Session::has('add_card')){
            Alert::success('', Session::get('add_card'));
        }
        if(Auth::check()){
            $user_id = Auth::user()->id;
        }
        else{
            $user_id = 0;
        }
        $parent_id = Category::where('parent_id',$id)->pluck('id')->toArray();
        array_push($parent_id,$id);
        $list_product = $product->shop($request,$id,$parent_id)->paginate(16);
        return view('frontend.pages.shop',compact('list_product','user_id','favoriteProduct','productAttribute'));
    }

    public function brand($id, Request $request, Product $product, FavoriteProduct $favoriteProduct, ProductAttribute $productAttribute){
        if(Session::has('delete_success')){
            Alert::success('', Session::get('delete_success'));
        }
        if(Session::has('add_success')){
            Alert::success('', Session::get('add_success'));
        }
        if(Session::has('error')){
            Alert::error('', Session::get('error'));
        }
        if(Auth::check()){
            $user_id = Auth::user()->id;
        }
        if(Session::has('add_card')){
            Alert::success('', Session::get('add_card'));
        }
        else{
            $user_id = 0;
        }
        $list_product = $product->shop_brand($request,$id)->paginate(16);
        return view('frontend.pages.shop',compact('list_product','user_id','favoriteProduct','productAttribute'));
    }

    public function material($id, Request $request, Product $product, FavoriteProduct $favoriteProduct, ProductAttribute $productAttribute){
        if(Session::has('delete_success')){
            Alert::success('', Session::get('delete_success'));
        }
        if(Session::has('add_success')){
            Alert::success('', Session::get('add_success'));
        }
        if(Session::has('error')){
            Alert::error('', Session::get('error'));
        }
        if(Auth::check()){
            $user_id = Auth::user()->id;
        }
        if(Session::has('add_card')){
            Alert::success('', Session::get('add_card'));
        }
        else{
            $user_id = 0;
        }
        $list_product = $product->shop_material($request,$id)->paginate(16);
        return view('frontend.pages.shop',compact('list_product','user_id','favoriteProduct','productAttribute'));
    }

    public function attribute($id, Request $request, Product $product, FavoriteProduct $favoriteProduct, ProductAttribute $productAttribute){
        if(Session::has('delete_success')){
            Alert::success('', Session::get('delete_success'));
        }
        if(Session::has('add_success')){
            Alert::success('', Session::get('add_success'));
        }
        if(Session::has('error')){
            Alert::error('', Session::get('error'));
        }
        if(Auth::check()){
            $user_id = Auth::user()->id;
        }
        if(Session::has('add_card')){
            Alert::success('', Session::get('add_card'));
        }
        else{
            $user_id = 0;
        }
        $list_product = $product->shop_attribute($request,$id)->paginate(16);
        return view('frontend.pages.shop',compact('list_product','user_id','favoriteProduct','productAttribute'));
    }
    // đánh giá sp
    public function post_rating($id,Request $req){
        $star = $req->star/100*5;
        $StarF = Rating::where([
            ['user_id','=',Auth::user()->id],
            ['product_id','=',$id]
        ])->first();
        if($StarF == null){
            $model=Rating::create([
                'product_id'=>$id,
                'star'=>$star,
                'user_id'=>Auth::user()->id,
                'content'=>$req->content,

            ]);
        }else{
            Rating::where('product_id','=',$id)->where('user_id','=',Auth::user()->id)->update([
                'star'=>$star,
                'content'=>$req->content
            ]); 
        }
        return redirect()->back()->with('sussess','You have successfully evaluated');
    }
}

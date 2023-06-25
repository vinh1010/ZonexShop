<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\FavoriteProduct;
use App\Models\Product;
use App\Models\Blog;
use App\Models\Banner;
use App\Models\CommentBlog;
use App\Models\Order;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function home(Product $product, FavoriteProduct $favoriteProduct, ProductAttribute $productAttribute, Blog $blog, CommentBlog $cmt, Order $order){
        if(Session::has('delete_success')){
            Alert::success('', Session::get('delete_success'));
        }
        if(Session::has('add_success')){
            Alert::success('', Session::get('add_success'));
        }
        if(Session::has('error')){
            Alert::error('', Session::get('error'));
        }
        if(Session::has('success')){
            Alert::success('', Session::get('success'));
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
        $list_featured_product = $order->get_seling_pro()->orderByDesc('quantity')->take(10)->get();;
        $list_new_product = $product->get_new_fresh();
        $list_blog = $blog->rerecentBlog();
        $list_cmt = $cmt->get_cmt_home();
        return view('frontend.pages.home',compact('list_featured_product','user_id','favoriteProduct','productAttribute','list_new_product','list_blog','list_cmt','order'));
    }
    public function about(){
        return view('frontend.pages.about',);
    }
    public function contact(){
        return view('frontend.pages.contact');
    }
    
}

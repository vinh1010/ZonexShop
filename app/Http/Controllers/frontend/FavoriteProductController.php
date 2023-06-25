<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\FavoriteProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class FavoriteProductController extends Controller
{
    public function add_favorite($id, FavoriteProduct $favoriteProduct, Request $request){
        if(Auth::check()){
            $product_id = $id;
            $user_id = Auth::user()->id;
            $favoriteProduct->add_favorite($product_id,$user_id);
            return redirect()->back()->with('add_success','Add Favorite Products Successfully');
        }
        else{
            return redirect()->back()->withError('Please To Log In');
        }
    }

    public function list_favorite(FavoriteProduct $favoriteProduct){
        if(Session::has('delete_page_favorite')){
            Alert::success('', Session::get('delete_page_favorite'));
        }
        $get_favorite = $favoriteProduct->list_favorite();
        return view('frontend.pages.favoriteProduct',compact('get_favorite'));
    }

    public function delete_favorite($id, Request $request, FavoriteProduct $favoriteProduct){
        $favoriteProduct->delete_favorite($id);
        return redirect()->back()->with('delete_success','Delete Favorite Products Successfully');
    }
}

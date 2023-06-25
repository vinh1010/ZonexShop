<?php

use App\Http\Controllers\backend\AttributeController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\BlogController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\MaterialController;
use App\Http\Controllers\backend\OrderManagementController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\frontend\BlogController as FrontendBlogController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\FavoriteProductController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\LoginRegisterController;
use App\Http\Controllers\frontend\ProntendProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix'=>'/'],function(){
    Route::get('/',[HomeController::class,'home'])->name('home');

    // Route sản phẩm
    Route::get('detail/{id}',[ProntendProductController::class,'detail'])->name('detail');
    Route::get('shop',[ProntendProductController::class,'shop_all'])->name('shop_all');
    Route::get('shop/category/{id}',[ProntendProductController::class,'category'])->name('category');
    Route::get('shop/brand/{id}',[ProntendProductController::class,'brand'])->name('brand');
    Route::get('shop/attribute/{id}',[ProntendProductController::class,'attribute'])->name('attribute');
    Route::get('shop/material/{id}',[ProntendProductController::class,'material'])->name('material');
    
    // Route đánh giá
    Route::post('rating/{id}',[ProntendProductController::class,'post_rating'])->name('post_rating');

    // Route quản lý sản phẩm yêu thích
    Route::get('add-favorite/{id}',[FavoriteProductController::class,'add_favorite'])->name('add_favorite');
    Route::get('list-favorite',[FavoriteProductController::class,'list_favorite'])->name('list-favorite');
    Route::get('delete-favorite/{id}',[FavoriteProductController::class,'delete_favorite'])->name('delete_favorite');

    // Route giỏ hàng
    Route::post('cart/{id}',[CartController::class,'cart'])->name('cart');
    Route::get('list-cart',[CartController::class,'show_cart'])->name('show_cart');
    Route::post('update-cart',[CartController::class,'update_all'])->name('update');
    Route::get('delete/{id}',[CartController::class,'delete'])->name('delete');
    Route::get('check-out',[CartController::class,'check_out'])->name('check_out');
    Route::post('check-out',[CartController::class,'post_checkOut'])->name('post_checkOut');
    Route::get('thank-order',[CartController::class,'thank_order'])->name('thank_order');
    
    Route::get('list-order',[CartController::class,'list_order'])->name('list_order');
    Route::get('order-detail/{id}',[CartController::class,'order_detail'])->name('order_detail');
    Route::get('cancel-order/{id}',[CartController::class,'cancel_order'])->name('cancel_order');

    // Route tin tức
    Route::get('blog',[FrontendBlogController::class,'blog'])->name('blog');
    Route::get('blog-detail/{id}',[FrontendBlogController::class,'blog_detail'])->name('blog_detail');
    Route::post('blog-detail/{id}',[FrontendBlogController::class,'post_cmt'])->name('post_cmt');

    // Route giới thiệu
    Route::get('about',[HomeController::class,'about'])->name('about');

    // Route liên hệ
    Route::get('contact',[HomeController::class,'contact'])->name('contact');

    // Route đăng nhập đăng kí
    Route::get('login',[LoginRegisterController::class,'login'])->name('login');
    Route::post('login',[LoginRegisterController::class,'post_login'])->name('post_login');
    Route::post('register',[LoginRegisterController::class,'post_register'])->name('post_register');
    Route::get('logout',[LoginRegisterController::class,'logout'])->name('logout');

    // Route quên mật khẩu
    Route::get('forgot',[LoginRegisterController::class,'forgot'])->name('forgot');
    Route::post('forgot',[LoginRegisterController::class,'post_email'])->name('post_email');
    Route::get('update-new-pass',[LoginRegisterController::class,'update_pass'])->name('update_pass');
    Route::post('update-new-pass',[LoginRegisterController::class,'post_new_pass'])->name('post_new_pass');


    // Route quản lý tài khoản người dùng
    Route::get('my-account',[LoginRegisterController::class,'my_account'])->name('my_account');
    Route::post('user-profile',[LoginRegisterController::class,'user_profile'])->name('user_profile');
    Route::post('change-password',[LoginRegisterController::class,'change_password'])->name('change_password');
});

// Route login admin
Route::get('admin/login',[DashboardController::class,'login'])->name('admin.login');
Route::post('admin/login',[DashboardController::class,'post_login'])->name('admin.post_login');
Route::get('admin/logout',[DashboardController::class,'logout'])->name('admin.logout');

// Các route backend,'middleware'=>'admin'
Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
    Route::get('/',[DashboardController::class,'admin'])->name('admin');
    Route::resource('category', CategoryController::class);
    Route::resource('brand',BrandController::class);
    Route::resource('banner',BannerController::class);
    Route::resource('attribute',AttributeController::class);
    Route::resource('material',MaterialController::class);
    Route::resource('product',ProductController::class);
    Route::resource('blog',BlogController::class);
    Route::get('order-management',[OrderManagementController::class,'list_order'])->name('order');
    Route::get('order-detail/{id}',[OrderManagementController::class,'detail_order'])->name('order.detail_order');
    Route::post('update-status/{id}',[OrderManagementController::class,'update_status'])->name('order.update_status');
    Route::get('user-management',[DashboardController::class,'list_user'])->name('user');
});


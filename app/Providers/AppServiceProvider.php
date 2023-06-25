<?php

namespace App\Providers;

use App\Helper\Cart;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Material;
use App\Models\Product;
use App\Models\ProductMaterial;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){
            $view->with([
                'cart' => new Cart(),
                'category' => new Category(),
                'brand' => new Brand(),
                'attribute' => new Attribute(),
                'material' => new Material(),
                'list_banner'=> Banner::where('status',1)->get(),
                'product' => new Product(),
                'product_material' => new ProductMaterial()
            ]);
        });
        Paginator::useBootstrap();
    }
}

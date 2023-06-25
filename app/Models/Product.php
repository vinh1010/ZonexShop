<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $fillable = ['name','image','status','price','sale_price','description','category_id','brand_id'];
    use HasFactory;
    // <- Admin ->
        // Lấy tất cả danh mục
        public function category(){
            return $this->belongsTo('App\Models\Category','category_id','id');
        }

        // Lấy tất cả nhãn hàng
        public function brand(){
            return $this->belongsTo('App\Models\Brand','brand_id','id');
        }

        // Hàm kiểm tra danh mục sản phẩm
        public function check_cate($id){
            return Product::where('category_id',$id);
        }

        // Hàm kiểm tra nhãng hàng sản phẩm
        public function check_brand($id){
            return Product::where('brand_id',$id);
        }
        
        public function product_count(){
            return Product::where('status',1)->get();
        }

        // Danh sách sản phẩm
        public function list_product($request){
            $keyword = $request->key;
            $product_key = Product::query();
            if($keyword){
                if($request->find_by){
                    if($request->find_by == 'max'){
                        $product_key->where('name','like','%'.$keyword.'%')->orderBy('price','ASC');
                    }
                    if($request->find_by == 'min'){
                        $product_key->where('name','like','%'.$keyword.'%')->orderBy('price','DESC');
                    }
                    if($request->find_by == 'pro_sale'){
                        $product_key->where('name','like','%'.$keyword.'%')->where('sale_price','!=',0)->orderBy('created_at','DESC');
                    }
                    if($request->find_by == 'status_hidden'){
                        $product_key->where('name','like','%'.$keyword.'%')->where('status','=',0)->orderBy('created_at','DESC');
                    }
                    else{
                        $product_key->where('name','like','%'.$keyword.'%')->orderBy('created_at','DESC');
                    }
                }
                $product_key->where('name','like','%'.$keyword.'%')->orderBy('created_at','DESC');
            }
            else{
                if($request->find_by){
                    if($request->find_by == 'max'){
                        $product_key->orderBy('price','ASC');
                    }
                    if($request->find_by == 'min'){
                        $product_key->orderBy('price','DESC');
                    }
                    if($request->find_by == 'pro_sale'){
                        $product_key->where('sale_price','!=',0)->orderBy('created_at','DESC');
                    }
                    if($request->find_by == 'status_hidden'){
                        $product_key->where('status','=',0)->orderBy('created_at','DESC');
                    }
                    else{
                        $product_key->orderBy('created_at','DESC');
                    }
                }
                $product_key->orderBy('created_at','DESC');
            }
            return $product_key->paginate(5);
        }

        // Thêm mới sản phẩm
        public function add_product($request){
            $file = $request->image;
            $name = $file->getClientOriginalName();
            $file->move(base_path('public/images/products'),$name);
            $product = Product::create([
                'name' => $request->name,
                'image' => $name,
                'status' => $request->status,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
            ]);
            return $product;
        }

        // Tìm sản phẩm theo id
        public function find_product($id){
            return Product::find($id);
        }
        
        // Cập nhật sản phẩm
        public function update_product($id,$request){
            $product = Product::find($id);
            if($request->image){
                $file = $request->image;
                $name = $file->getClientOriginalName();
                $file->move(base_path('public/images/products'),$name);
                unlink('images/products/'.$product->image);
            }
            else{
                $name = $product->image;
            }
            Product::find($id)->update([
                'name' => $request->name,
                'image' => $name,
                'status' => $request->status,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
            ]);
        }

        // Xóa sản phẩm
        public function delete_product($id){
            $product = Product::find($id)->image;
            unlink('images/products/'.$product);
            Product::destroy($id);
        }
    // <- /Admin ->

    // <- Customer ->
        // Lấy tất cả sản phẩm
        public function get_new_product(){
            return Product::all()->limit();
        }

        public function get_new_fresh(){
            return Product::orderBy('created_at','desc')->limit(20)->get();
        }

        // Lấy size của sản phẩm
        public function get_atttribute_size($id){
            return  DB::table('products')->select('product_attributes.attribute_id','attributes.name as name_color','attributes.attribute','attributes.value')
            ->join('product_attributes','products.id','=','product_attributes.product_id')->join('attributes','attributes.id','=','product_attributes.attribute_id')
            ->where('products.id',$id)->where('attributes.attribute',1)->get();
        }

        // Lấy màu của sản phẩm
        public function get_atttribute_color($id){
            return  DB::table('products')->select('product_attributes.attribute_id','attributes.name as name_color','attributes.attribute','attributes.value')
            ->join('product_attributes','products.id','=','product_attributes.product_id')->join('attributes','attributes.id','=','product_attributes.attribute_id')
            ->where('products.id',$id)->where('attributes.attribute',0)->get();
        }

        // Lấy sản phẩm theo danh mục
        public function get_pro_by_bigCate($id){
            return  Product::select('categories.id')->join('categories','categories.id','products.category_id')->where('category_id',$id)
            ->where('categories.id ',$id)->orderBy('created_at','DESC')->get();
        }

        // Lấy sản phẩm theo danh mục
        public function get_pro_by_smaillCate($id){
            return  Product::select('categories.parent_id')->join('categories','categories.id','products.category_id')->where('category_id',$id)
            ->where('categories.parent_id',1)->orderBy('created_at','DESC')->get();
        }

        // Lấy tất cả sản phẩm route('shop')
        public function shop_all($request){
            $product_key = Product::query();
            if($request->key){
                $keyword = $request->key;
                if($request->find_by){
                    if($request->find_by == 'max'){
                        $product_key->where('status',1)->orderBy('price','ASC');
                    }
                    if($request->find_by == 'min'){
                        $product_key->where('status',1)->orderBy('price','DESC');
                    }
                    if($request->find_by == 'pro_sale'){
                        $product_key->where('status',1)->where('sale_price','!=',0);
                    }
                    else{
                        $product_key->where('status',1)->orderBy('created_at','DESC');
                    }
                }
                $product_key->where('status',1)->where('name','like','%'.$keyword.'%')
                ->orderBy('created_at','DESC');  
            }
            if($request->find_by){
                if($request->find_by == 'max'){
                    $product_key->where('status',1)->orderBy('price','ASC');
                }
                if($request->find_by == 'min'){
                    $product_key->where('status',1)->orderBy('price','DESC');
                }
                if($request->find_by == 'pro_sale'){
                    $product_key->where('status',1)->where('sale_price','!=',0);
                }
                else{
                    $product_key->where('status',1)->orderBy('created_at','DESC');
                }
            }
            else{
                $product_key->where('status',1)->orderBy('created_at','DESC');
            }
            return $product_key;
        }

        // Lấy sản phẩm theo danh mục route('shop')
        public function shop($request,$id,$parent_id){
            $product_key = Product::query();
            if($request->find_by){
                if($request->find_by == 'max'){
                    $product_key->whereIn('category_id',$parent_id)
                    ->where('status',1)->orderBy('price','ASC');
                }
                if($request->find_by == 'min'){
                    $product_key->whereIn('category_id',$parent_id)
                    ->where('status',1)->orderBy('price','DESC');
                }
                if($request->find_by == 'pro_sale'){
                    $product_key->whereIn('category_id',$parent_id)
                    ->where('status',1)->where('sale_price','!=',0);
                }
                else{
                    $product_key->whereIn('category_id',$parent_id)->where('status',1)->orderBy('created_at','DESC');
                }
            }
            else{
                $product_key->whereIn('category_id',$parent_id)
                ->where('status',1)->orderBy('created_at','DESC');
            }
            return $product_key;
        }

        // Lấy sản phẩm theo nhãn hàng route('shop')
        public static function shop_brand($request,$id){
            $product_key = Product::query();
            if($request->find_by){
                if($request->find_by == 'max'){
                    $product_key->where('brand_id',$id)->where('status',1)
                    ->orderBy('price','ASC');
                }
                if($request->find_by == 'min'){
                    $product_key->where('brand_id',$id)->where('status',1)
                    ->orderBy('price','DESC');
                }
                if($request->find_by == 'pro_sale'){
                    $product_key->where('brand_id',$id)->where('status',1)
                    ->where('sale_price','!=',0);
                }
                else{
                    $product_key->where('brand_id',$id)->where('status',1)->orderBy('created_at','DESC');
                }
            }
            else{
                $product_key->where('brand_id',$id)->where('status',1)->orderBy('created_at','DESC');
            }
            return $product_key;
        }

        // Lấy sản phẩm theo thuộc tính route('shop')
        public function shop_attribute($request,$id){
            if($request->find_by){
                switch($request->find_by){
                    case 'max':
                        $product_key = Product::select('products.*','product_attributes.attribute_id')->join('product_attributes','products.id','=','product_attributes.product_id')
                        ->where('product_attributes.attribute_id',$id)->where('products.status',1)
                        ->orderBy('products.price','ASC');
                    break;
                    case 'min':
                        $product_key = Product::select('products.*')->join('product_attributes','products.id','=','product_attributes.product_id')
                        ->where('product_attributes.attribute_id',$id)->where('products.status',1)
                        ->orderBy('products.price','DESC');
                    break;
                    case 'pro_sale':
                        $product_key = Product::select('products.*')->join('product_attributes','products.id','=','product_attributes.product_id')
                        ->where('product_attributes.attribute_id',$id)->where('products.status',1)
                        ->where('products.sale_price','!=',0);
                    break;
                    default: 
                    $product_key = Product::select('products.*')->join('product_attributes','products.id','=','product_attributes.product_id')
                        ->where('product_attributes.attribute_id',$id)->where('products.status',1)
                        ->orderBy('products.created_at','DESC');
                    break;
                }
            }
            else{
                $product_key = Product::select('products.*')->join('product_attributes','products.id','product_attributes.product_id')
                ->where('product_attributes.attribute_id',$id)->where('products.status',1)
                ->orderBy('products.created_at','DESC');
            }
            return $product_key;
        }

        // Lấy sản phẩm theo chất liệu route('shop')
        public function shop_material($request,$id){
            if($request->find_by){
                switch($request->find_by){
                    case 'max':
                        $product_key = Product::select('products.*')->join('product_materials','products.id','product_materials.product_id')
                        ->where('product_materials.material_id',$id)->where('products.status',1)
                        ->orderBy('price','ASC');
                    break;
                    case 'min':
                        $product_key = Product::select('products.*')->join('product_materials','products.id','product_materials.product_id')
                        ->where('product_materials.material_id',$id)->where('products.status',1)
                        ->orderBy('price','DESC');
                    break;
                    case 'pro_sale':
                        $product_key = Product::select('products.*')->join('product_materials','products.id','product_materials.product_id')
                        ->where('product_materials.material_id',$id)->where('products.status',1)
                        ->where('sale_price','!=',0);
                    break;
                    default: 
                        $product_key = Product::select('products.*')->join('product_materials','products.id','product_materials.product_id')
                        ->where('product_materials.material_id',$id)->where('products.status',1)
                        ->orderBy('products.created_at','DESC');
                    break;
                }
            }
            else{
                $product_key = Product::select('products.*')->join('product_materials','products.id','product_materials.product_id')
                ->where('product_materials.material_id',$id)->where('products.status',1)
                ->orderBy('products.created_at','DESC');
            }
            return $product_key;
        }

        // Lấy sản phẩm liên quan
        public function related_product($category_id,$brand_id,$id){
            return Product::where('category_id',$category_id)->where('brand_id',$brand_id)->where('id','!=',$id)->get();
        }

        // Đếm product theo danh mục
        public function count_pro_by_cate($id){
            return Product::select('products.*','categories.parent_id')->join('categories','products.category_id','categories.id')->where('categories.parent_id',$id)->get()->count();
        }
        
    // <- /Customer ->

    public function Star($id){
        $avgStar = Rating::where('product_id','=',$id)->avg('star');
        return $avgStar;
    }

    public function check_order($id_cus , $id_product){
        $check = OrderDetail::where('product_id',$id_product)->get()->count();
        return $check;
    }

}

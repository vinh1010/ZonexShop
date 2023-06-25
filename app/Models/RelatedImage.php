<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelatedImage extends Model
{
    protected $fillable = ['product_id','image'];
    use HasFactory;

    // Thêm mới ảnh liên quan
    public function add_relatedImage($id_product,$request){
        $file = $request->image_related;
        foreach($file as $value){
            $name = $value->getClientOriginalName();
            $value->move(base_path('public/images/relate_images'),$name);
            RelatedImage::create([
                'product_id' => $id_product,
                'image' => $name
            ]);
        }
    }

    // Tìm ảnh liên quan theo id
    public function find_relatedImage($id){
        return RelatedImage::where('product_id',$id)->get();
    }

    // Cập nhật ảnh liên quan
    public function update_relatedImage($id,$request){
        $related_image = RelatedImage::where('product_id',$id)->pluck('image');
        if($request->image_related){
            foreach($related_image as $value){
                unlink('images/relate_images/'.$value);
            }
            RelatedImage::where('product_id',$id)->delete();
            $file = $request->image_related;
            foreach($file as $value){
                $name = $value->getClientOriginalName();
                $value->move(base_path('public/images/relate_images'),$name);
                RelatedImage::create([
                    'product_id' => $id,
                    'image' => $name
                ]);
            }
        }
    }

    // Xóa ảnh liên quan
    public function delete_relatedImage($id){
        $images = RelatedImage::where('product_id',$id)->pluck('image');
        foreach($images as $value){
            unlink('images/relate_images/'.$value);
        }
        RelatedImage::where('product_id',$id)->delete();
    }
}

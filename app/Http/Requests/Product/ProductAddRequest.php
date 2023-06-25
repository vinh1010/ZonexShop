<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'image'=> 'required',
            'price' => 'required',
            'sale_price'=>'lt:price',
            'category_id' => 'required',
            'brand_id' => 'required',
            'image_related' => 'required',
            'attributes' => 'required',
            'material' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Product names cannot be null',
            'image.required'=>'Please choose an avatar',
            'price.required'=>'Please enter product price',
            'sale_price.lt'=>'The discount price must be less than the product price',
            'category_id.required'=>'Please select product category',
            'brand_id.required'=>'Please select brand',
            'image_related.required'=>'Please select related images',
            'attributes.required' => 'Please select product attributes',
            'material.required'=>'Please choose product material'
        ];
    }
}

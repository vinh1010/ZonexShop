<?php

namespace App\Http\Requests\Banner;

use Illuminate\Foundation\Http\FormRequest;

class BannerAddRequest extends FormRequest
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
            'image' => 'required|unique:banners',
            'category_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Banner names cannot be null',
            'image.required'=>'Please choose a banner image',
            'image.unique'=>'Image name already exists, please rename image',
            'category_id.required' => 'Please select category'
        ];
    }
}

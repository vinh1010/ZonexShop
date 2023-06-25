<?php

namespace App\Http\Requests\Banner;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BannerUpdateRequest extends FormRequest
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
            'image'=> [
                Rule::unique('banners')->ignore($this->id,'id'),
            ],
            'category_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Brand names cannot be null',
            'image.unique'=>'Image name already exists, please rename image',
            'category_id.required' => 'Please select category'
        ];
    }
}

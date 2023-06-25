<?php

namespace App\Http\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandUpdateRequest extends FormRequest
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
            'name'=> [
                'required',
                Rule::unique('brands')->ignore($this->id,'id'),
            ],
            'logo'=> [
                Rule::unique('brands')->ignore($this->id,'id'),
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Brand names cannot be null',
            'name.unique'=>'Brand name already exists, please enter another name',
            'logo.required'=>'Please choose a brand image',
        ];
    }
}

<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class CategoryUpdateRequest extends FormRequest
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
                Rule::unique('categories')->ignore($this->id,'id'),
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Category names cannot be null',
            'name.unique'=>'Category name already exists, please enter another name',
        ];
    }
}

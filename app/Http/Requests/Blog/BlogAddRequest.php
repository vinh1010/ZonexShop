<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class BlogAddRequest extends FormRequest
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
            'title' => 'required',
            'category_id' => 'required',
            'image' => 'required',
            'summary' => 'required',
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Title names cannot be null',
            'category_id.required'=>'Please select product category',
            'image.required'=>'Please choose an image',
            'summary.required'=>'Summary names cannot be null',
            'content.required'=>'Content names cannot be null'
        ];
    }
}

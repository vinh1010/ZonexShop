<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;

class CheckOutRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'address_ship'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Name cannot be null',
            'email.required'=>'Email cannot be null',
            'email.email'=>'Wrong email format',
            'address_ship.required'=>'Address Ship cannot be null',
        ];
    }
}

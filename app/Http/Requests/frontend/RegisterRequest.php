<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name_rs'=>'required',
            'email'=>'required|unique:users|email',
            'password_rs'=>'required',
            'cf_password'=>'required|same:password_rs'
        ];
    }

    public function messages()
    {
        return [
            'name_rs.required'=>'Name cannot be null',
            'email.required'=>'Email cannot be null',
            'email.email'=>'Wrong email format',
            'email.unique'=>'Email already exists, please choose another name',
            'password_rs.required'=>'Password cannot be null',
            'cf_password.required'=>'Confirm Password cannot be null',
            'cf_password.same'=>'Confirm Password is not correct',
        ];
    }
}

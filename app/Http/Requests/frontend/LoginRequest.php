<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email_lg'=>'required',
            'password'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'email_lg.required'=>'Email cannot be null',
            'password.required'=>'Password cannot be null',
        ];
    }
}

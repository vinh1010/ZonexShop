<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'password'=>'required',
            'new_password'=>'required',
            'confirm'=>'required|same:new_password'
        ];
    }

    public function messages()
    {
        return [
            'password.required'=>'Password Cannot Be Null',
            'new_password.required'=>'New Password Cannot Be Null',
            'confirm.required'=>'Confirm Password cannot be null',
            'confirm.same'=>'Confirm Password is not correct',
        ];
    }
}

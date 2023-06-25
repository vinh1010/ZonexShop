<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;

class UserProfile extends FormRequest
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
            'phone'=>'required|alpha_num|unique:users'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Name Cannot Be Null',
            'email.required'=>'Email Cannot Be Null',
            'phone.required'=>'Phone Cannot Be Null',
            'email.email'=>'Wrong Email Format',
            'phone.alpha_num'=>'Phone Number Must Be Number',
            'phone.unique'=>'Phone Number already exists, please enter another phone',
        ];
    }
}

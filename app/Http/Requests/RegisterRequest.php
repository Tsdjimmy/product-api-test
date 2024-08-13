<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'name.required' => 'The name field is required.',
    //         'name.string' => 'The name must be a string.',
    //         'name.max' => 'The name may not be greater than 255 characters.',
    //         'email.required' => 'The email field is required.',
    //         'email.email' => 'The email must be a valid email address.',
    //         'email.unique' => 'The email has already been taken.',
    //         'password.required' => 'The password field is required.',
    //         'password.string' => 'The password must be a string.',
    //         'password.min' => 'The password must be at least 8 characters.',
    //         'password.confirmed' => 'The password confirmation does not match.',
    //     ];
    // }
}

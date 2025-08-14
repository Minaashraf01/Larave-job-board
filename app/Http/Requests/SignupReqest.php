<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupReqest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name'=> 'bail|unique:users|required|string',
             'email' => "bail|required|string|email|unique:users",
            'password' => 'bail|required|string|min:8|confirmed', 
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentPostReqest extends FormRequest
{

    public function rules(): array
    {
        return [
            'content' => "bail|required",
            'author' => 'required'
        ];
    }
    public function messages(){
        return[
              'content.required' => 'mandatory field',
            'author.required' => 'mandatory field'
        ];
    }
}

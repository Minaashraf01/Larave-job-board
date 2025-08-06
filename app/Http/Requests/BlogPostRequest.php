<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
{

       public function rules(): array
    {
        return [
            'title' => "bail|required|unique:post,title,{$this->input('id')}",
            'author' => 'required', 
            'body' => 'required'
        ];
    }
    public function messages(){
        return[
              'title.required' => 'mandatory field',
            'author.required' => 'mandatory field',
            'body.required' => 'mandatory field',
        ];
    }
}

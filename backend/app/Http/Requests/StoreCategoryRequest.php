<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'name' => 'required',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}

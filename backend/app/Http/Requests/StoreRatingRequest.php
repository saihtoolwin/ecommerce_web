<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRatingRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'user_id' => 'required',
            'product_id' => 'required',
            'rating_value'=> 'required',
            // 'rating_date'=> 'required',
        ];
    }
}

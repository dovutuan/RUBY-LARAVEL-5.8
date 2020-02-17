<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'detail' => 'required',
//            'category_id'=>'required',
//            'color_id[]'=>'required',
//            'size_id[]'=>'required',
//            'price[]' =>'required',
        ];
    }
}

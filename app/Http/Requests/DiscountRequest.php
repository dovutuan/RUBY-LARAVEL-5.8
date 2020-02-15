<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255|unique:discounts,name,' . $this->id,
            'price' => 'required',
            'start' => 'required',
            'finish'=>'required',
            'amount'=>'required',
        ];
    }
}

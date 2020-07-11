<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255|unique:suppliers,name,' . $this->id,
            'phone' => 'required|between:9,12',
            'address' => 'required|max:255',
        ];
    }
}

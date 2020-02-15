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
            'name' => 'required|max:255|unique:suppliers,name' . $this->id,
            'company' => 'required|max:255|unique:suppliers,company',
            'phone' => 'required|max:11',
            'address' => 'required|max:255',
            'email' => 'required|email|max:255',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayPalRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'amount' => 'required|numeric',
        ];
    }
}

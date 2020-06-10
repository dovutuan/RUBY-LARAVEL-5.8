<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255|unique:users,name,' . $this->id,
            'birth' => 'required',
            'phone' => 'required|max:11',
            'address' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->id,
            'password' => 'required|confirmed|min:6|max:255',
        ];
    }
}

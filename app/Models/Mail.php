<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Mail extends Model
{
    static public function sendMailBill($request)
    {
        $user = Auth::user();
        $cart = Session::getSessionCart();
        $data = [
            'request' => $request,
            'user' => $user,
            'cart' => $cart,
        ];

        $email = 'tuandv02@ominext.com';
        $name = 'tuandv';
        \Illuminate\Support\Facades\Mail::send('mail.mail_bill_customer', $data, function ($message) use ($user, $name, $email) {
            $message->to($email, $name)->subject(__('messages.[RUBY]-order'));
            $message->from(config('app.mail_user'), config('app.mail_name'));
        });
    }
}

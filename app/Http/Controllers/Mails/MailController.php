<?php

namespace App\Http\Controllers\Mails;

use App\Models\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMailBill()
    {
        $user = Auth::user();
        $carts = Session::getSessionCart();
        $session_discount = Session::getSessionDiscount();
        $data = [
            'user' => $user,
            'carts' => $carts,
            'session_discount' => $session_discount,
            'discount_price' => $session_discount['discount_price'],
            'total_price' => $session_discount['total_price'],
            'money_paid' => $session_discount['money_paid'],
        ];
//        dd($data);
        $email = 'tuandv02@ominext.com';
        $name = 'tuandv';
        Mail::send('mail.mail_bill_customer', $data, function ($message) use ($user, $name, $email) {
            $message->to($email, $name)->subject(__('messages.[RUBY]-order'));
            $message->from(config('app.mail_user'), config('app.mail_name'));
        });
        return back();
    }
}

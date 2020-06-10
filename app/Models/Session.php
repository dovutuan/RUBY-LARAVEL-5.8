<?php

namespace App\Models;

use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    static public function getSessionDiscount()
    {
        $carts = Cart::content();
        $session_discount = session(md5('discount_code'));
        $discount_id = null;
        $discount_code = null;
        $discount_name = null;
        $discount_price = null;
        $total_price = str_replace(',', '', Cart::total(ZERO, THREE));
        $money_paid = session(md5('totalPricePayPal')) ? session(md5('totalPricePayPal')) : null;
        $seller = null;

        if ($session_discount) {
            $discount_id = $session_discount['discount_id'];
            $discount_code = $session_discount['discount_code'];
            $discount_name = $session_discount['discount_name'];
            foreach ($carts as $cart) {
                $seller = $cart->options->seller;
            }
            $date_now = Carbon::now()->format('Y-m-d');
            $discount = Discount::where('code', $session_discount['discount_code'])->where('status', ONE)->where('amount', '>', ZERO)->where('created_by', $seller)->where('finish', '>=', $date_now)->first();
            if ($discount) {
                $discount_price = $discount->price;
            }
            $discount_price && $total_price = $total_price - $discount->price;
        }
        $total_price = $total_price - $money_paid;

        $total_price <= ZERO && $total_price = ZERO;

        $data = [
            'discount_id' => $discount_id,
            'discount_price' => $discount_price,
            'discount_code' => $discount_code,
            'discount_name' => $discount_name,
            'total_price' => $total_price,
            'money_paid' => $money_paid,
            'carts' => $carts,
            'seller' => $seller,
        ];
        return $data;
    }

    static public function getSessionCart()
    {
        $carts = Cart::content();
        return $carts;
    }
}

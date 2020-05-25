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
        $total_price = ZERO;

        if ($session_discount) {
            $sellers = [];
            $discount_id = $session_discount['discount_id'];
            $discount_code = $session_discount['discount_code'];
            $discount_name = $session_discount['discount_name'];
            foreach ($carts as $cart) {
                $sellers[] = $cart->options->seller;
            }
            $sellers = array_unique($sellers);
            foreach ($sellers as $seller) {
                $date_now = Carbon::now()->format('Y-m-d');
                $discount = Discount::where('code', $session_discount['discount_code'])->where('status', ONE)->where('amount', '>', ZERO)->where('created_by', $seller)->where('finish', '>=', $date_now)->first();
                $discount_price = $discount->price;
            }
            $total_price = str_replace(',', '', Cart::total(ZERO, THREE)) - $discount->price > ZERO ? str_replace(',', '', Cart::total(ZERO, THREE)) - $discount->price : ZERO;
        }

        $data = [
            'discount_id' => $discount_id,
            'discount_price' => $discount_price,
            'discount_code' => $discount_code,
            'discount_name' => $discount_name,
            'total_price' => $total_price,
        ];
        return $data;
    }
}

<?php

namespace App\Http\Controllers\Home;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::content();
//        $price = [];
//        foreach ($carts as $cart) {
//            $price[] = [$cart->price * $cart->qty];
//        }
//        if ($carts->price->count() <= 10000)
//            Cart::setGlobalTax(9);
//        elseif ($carts->price->count() > 10000 && $carts->price->count() <= 100000)
//            Cart::setGlobalTax(6);
//        elseif ($carts->price->count() > 100000 && $carts->price->count() <= 1000000)
//            Cart::setGlobalTax(3);
//        elseif ($carts->price->count() > 1000000 && $carts->price->count() <= 10000000)
//            Cart::setGlobalTax(0);
        $data = [
            'carts' => $carts
        ];
        return view('home.cart', $data);
    }

    public function update(Request $request, $key)
    {
        $amount = $request->input('amount');
        $cart = Cart::get($key);
        if ($cart) {
            Cart::update($key, $amount);
            return redirect()->back()->with('success', __('messages.success-update-cart'));
        }
        return redirect()->back()->with('error', __('messages.error-update-cart'));
    }

    public function destroy($key)
    {
        Cart::remove($key);
        return redirect()->back()->with('success', __('messages.delete-cart'));
    }

    public function destroyAll()
    {
        Cart::destroy();
        return redirect()->back()->with('success', __('messages.delete-all-cart'));
    }

}

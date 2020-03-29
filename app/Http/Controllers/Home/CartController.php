<?php

namespace App\Http\Controllers\Home;

use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index()
    {
        $categories = Category::loadCategories();
        $carts = Cart::content();
        $price = [];
        foreach ($carts as $cart) {
            $price[] = ($cart->price * $cart->qty);
        }
        $price = array_sum($price);
        switch ($price) {
            case($price <= 10000) :
                Cart::setGlobalTax(6);
                break;
            case($price > 10000 && $price <= 100000) :
                Cart::setGlobalTax(4);
                break;
            case($price > 100000 && $price <= 1000000) :
                Cart::setGlobalTax(2);
                break;
            case($price > 1000000) :
                Cart::setGlobalTax(0);
                break;
            default:
                Cart::setGlobalTax(0);
        };
        $data = [
            'categories' => $categories,
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

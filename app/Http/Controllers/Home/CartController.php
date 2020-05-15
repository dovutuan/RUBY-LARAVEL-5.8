<?php

namespace App\Http\Controllers\Home;

use App\Models\Category;
use App\Models\Discount;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index()
    {
        $categories = Category::loadCategories();
        $allCategories = Category::loadAllCategories();
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
        }
        $data = [
            'categories' => $categories,
            'allCategories' => $allCategories,
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

    public function checkDiscount(Request $request)
    {
        $discount_code = $request->input('discount');
        $carts = Cart::content();
        $sellers = [];
        $discount = '';

        if (empty($discount_code)) {
            return redirect()->back()->with('warning', __('messages.discount-empty'));
        }

        foreach ($carts as $cart) {
            $sellers[] = $cart->options->seller;
        }
        $sellers = array_unique($sellers);
        foreach ($sellers as $seller) {
            $date_now = Carbon::now()->format('Y-m-d');
            $discount = Discount::where('code', $discount_code)->where('status', ONE)->where('amount', '>', ZERO)->where('created_by', $seller)->where('finish', '>=', $date_now)->first();
        }
        session([md5('discount_code') => [$discount->id, $discount->code, $discount->name]]);
        return redirect()->back()->with('success', __('messages.discount-empty'));
    }

}

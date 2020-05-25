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
            case($price <= TEN_THOUSAND) :
                Cart::setGlobalTax(SIX);
                break;
            case($price > TEN_THOUSAND && $price <= ONE_HUNDRED_THOUSAND) :
                Cart::setGlobalTax(FOUR);
                break;
            case($price > ONE_HUNDRED_THOUSAND && $price <= ONE_MILLION) :
                Cart::setGlobalTax(TWO);
                break;
            default:
                Cart::setGlobalTax(ZERO);
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
        session([md5('discount_code') => [
            'discount_id' => $discount->id,
            'discount_code' => $discount->code,
            'discount_name' => $discount->name
        ]]);
        return redirect()->back()->with('success', __('messages.discount-success'));
    }

}

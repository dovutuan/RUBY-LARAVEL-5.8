<?php

namespace App\Http\Controllers\Home;

use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function pay()
    {
        $allCategories = Category::loadAllCategories();
        $carts = Cart::content();

        $data = [
            'allCategories' => $allCategories,
            'carts' => $carts,
        ];
        return view('home.checkout', $data);
    }
}

<?php

namespace App\Http\Controllers\Home;

use App\Models\OptionProduct;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShoppingController extends Controller
{
    public function addCart(Request $request, $id)
    {
        $option = $request->input('option');
        $amount = $request->input('amount');
        $product = Product::findOrFail($id);
        $option_product = OptionProduct::where('id', $option)->where('product_id', $product->id)->first();
        if ($product && $option_product) {
            $sale = $product->sale ? $product->sale->sale : 0;
            $price = $product->sale ? $option_product->price * (100 - $sale) / 100 : $option_product->price;
            Cart::add([
                'id' => $id,
                'name' => $product->name,
                'qty' => $amount,
                'price' => $price,
                'weight' => 0,
                'options' => [
                    'supplier' => $option_product->suppliers->name,
                    'species' => $option_product->species->name,
                    'amount' => $option_product->amount,
                    'image' => $product->image,
                ],
            ]);
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'Error');
        }
    }
}

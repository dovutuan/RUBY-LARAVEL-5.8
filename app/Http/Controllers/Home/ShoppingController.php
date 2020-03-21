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
        $product = Product::findOrFail($id);
        $option_product = OptionProduct::where('id', $option)->where('product_id', $product->id)->first();
        if ($product && $option_product) {
            $sale = $product->sale ? $product->sale->sale : 0;
            $price = $product->sale ? $option_product->price * (100 - $sale) / 100 : $option_product->price;
            $a = Cart::add([
                'id' => $id,
                'name' => $product->name,
                'qty' => ONE,
                'price' => $price,
                'weight' => 0,
                'options' => [
                    'supplier_id' => $option_product->supplier_id,
                    'species_id' => $option_product->species_id,
                    'amount' => $option_product->amount,
                ],
            ]);
            return redirect()->back();
        }
        else
        {
          return redirect()->back()->with('error', 'Error');
        }
    }
}

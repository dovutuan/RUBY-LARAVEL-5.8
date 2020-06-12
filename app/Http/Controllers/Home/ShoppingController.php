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
            $sale = $product->sale ? $product->sale->sale : ZERO;
            $price = $product->sale ? $option_product->price * (ONE_HUNDRED - $sale) / ONE_HUNDRED : $option_product->price;

            if (Cart::count() > ZERO) {
                $seller = '';
                foreach (Cart::content() as $cart) {
                    $seller = $cart->options['seller'];
                }
                if ($seller === $product->created_by) {
                    $this->createCart($id, $product->name, $amount, $price, $option_product->suppliers->name, $option_product->species->name, $option_product->amount, $product->image, $seller, $option_product->species_id);

                    return redirect()->back()->with('success', __('messages.add-product-to-cart-successfully'));
                } else {
                    return redirect()->back()->with('error', __('messages.product-are-not-the-same-seller'));
                }
            } else {
                $this->createCart($id, $product->name, $amount, $price, $option_product->suppliers->name, $option_product->species->name, $option_product->amount, $product->image, $product->created_by, $option_product->species_id);

                return redirect()->back()->with('success', __('messages.add-product-to-cart-successfully'));
            }
        } else {
            return redirect()->back()->with('error', __('messages.error'));
        }
    }

    public function createCart($id, $name, $qty, $price, $supplier, $species, $amount, $image, $seller, $species_id)
    {
        Cart::add([
            'id' => $id,
            'name' => $name,
            'qty' => $qty,
            'price' => $price,
            'weight' => 0,
            'options' => [
                'supplier' => $supplier,
                'species' => $species,
                'amount' => $amount,
                'image' => $image,
                'seller' => $seller,
                'species_id' => $species_id,
            ],
        ]);
    }
}

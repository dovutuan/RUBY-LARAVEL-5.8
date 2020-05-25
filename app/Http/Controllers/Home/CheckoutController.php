<?php

namespace App\Http\Controllers\Home;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Session;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Description;

class CheckoutController extends Controller
{
    public function checkOut()
    {
        $session_discount = Session::getSessionDiscount();
        $allCategories = Category::loadAllCategories();
        $carts = Cart::content();

        $data = [
            'allCategories' => $allCategories,
            'carts' => $carts,
            'discount_price' => $session_discount['discount_price'],
            'total_price' => $session_discount['total_price']
        ];
        return view('home.checkout', $data);
    }

    public function pay(Request $request)
    {
        try {
            DB::beginTransaction();
            $session_discount = Session::getSessionDiscount();
            $carts = Cart::content();

            $bill = Bill::create([
                'user_id' => Auth::user()->id,
                'seller_id' => Auth::user()->id,
                'created_by' => Auth::user()->id,
                'price' => $session_discount['total_price'],
                'address' => $request->input('other_address'),
                'note' => $request->input('note'),
                'discount_id' => $session_discount['discount_id'],
                'discount_code' => $session_discount['discount_code'],
                'discount_name' => $session_discount['discount_name'],
                'discount_price' => $session_discount['discount_price'],
                'tax_rate' => str_replace(',', '', Cart::tax(ZERO, THREE)),
            ]);
            if ($bill) {
                foreach ($carts as $cart) {
                    BillDetail::insert([
                        'bill_id' => $bill->id,
                        'product_id' => $cart->id,
                        'price' => $cart->price,
                        'amount' => $cart->options->amount,
                        'qty' => $cart->qty,
                        'species_id' => $cart->options->species_id,
                        'created_by' => Auth::user()->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
            $discount = Discount::where('id', $session_discount['discount_id'])->first();
            $discount->update([
                'use' => $discount->use = $discount->use + ONE,
                'amount' => $discount->amount = $discount->amount - ONE,

            ]);
            DB::commit();
            session()->forget(md5('discount_code'));
            Cart::destroy();
            return redirect()->route('home')->with('success', __('messages.order-success'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}

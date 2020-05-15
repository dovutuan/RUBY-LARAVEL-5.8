<?php

namespace App\Http\Controllers\Home;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Category;
use App\Models\Discount;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function checkOut()
    {
        $allCategories = Category::loadAllCategories();
        $session_discount = session(md5('discount_code'));
        $carts = Cart::content();

        $data = [
            'allCategories' => $allCategories,
            'carts' => $carts,
        ];

        if ($session_discount) {
            $sellers = [];
            foreach ($carts as $cart) {
                $sellers[] = $cart->options->seller;
            }
            $sellers = array_unique($sellers);
            foreach ($sellers as $seller) {
                $date_now = Carbon::now()->format('Y-m-d');
                $discount = Discount::where('code', $session_discount[1])->where('status', ONE)->where('amount', '>', ZERO)->where('created_by', $seller)->where('finish', '>=', $date_now)->first();
            }
            $total_price = str_replace(',', '', Cart::total(0, 3)) - $discount->price;
            session()->push(md5('discount_code'), $total_price);

//             array_push($data, ['discount' => $discount, 'total_price' => $total_price]);
        }
        $data = [
            'allCategories' => $allCategories,
            'carts' => $carts,
            'discount' => $discount,
            'total_price' => $total_price
        ];
        return view('home.checkout', $data);
    }

    public function pay(Request $request)
    {
        try {
            DB::beginTransaction();
            $session_discount = session(md5('discount_code'));
            $carts = Cart::content();
            $bill = Bill::create([
                'user_id' => Auth::user()->id,
                'created_by' => Auth::user()->id,
                'price' => $session_discount[3],
                'address' => $request->input('other_address'),
                'note' => $request->input('note'),
                'discount_id' => $session_discount[0],
                'discount_code' => $session_discount[1],
                'discount_name' => $session_discount[2],
                'tax_rate' => str_replace(',', '', Cart::tax(0, 3)),
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
            DB::commit();
            session()->forget(md5('discount_code'));
            Cart::destroy();
            return redirect()->route('home');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}

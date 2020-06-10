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
use Illuminate\Support\Facades\Mail;
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
            'total_price' => $session_discount['total_price'],
            'money_paid' => $session_discount['money_paid'],
        ];
        return view('home.checkout', $data);
    }

    public function pay(Request $request)
    {
        try {
            DB::beginTransaction();
            $session_discount = Session::getSessionDiscount();
            $carts = Cart::content();
            $user = Auth::user();
            
            $bill = Bill::create([
                'user_id' => Auth::user()->id,
                'seller_id' => $session_discount['seller'],
                'created_by' => Auth::user()->id,
                'price' => $session_discount['total_price'],
                'price_paid' => null || $session_discount['money_paid'],
                'address' => $request->input('other_address'),
                'note' => $request->input('note'),
                'discount_id' => null || $session_discount['discount_id'],
                'discount_code' => null || $session_discount['discount_code'],
                'discount_name' => null || $session_discount['discount_name'],
                'discount_price' => null || $session_discount['discount_price'],
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
            if ($session_discount['discount_id']) {
                $discount = Discount::where('id', $session_discount['discount_id'])->first();
                $discount->update([
                    'use' => $discount->use = $discount->use + ONE,
                    'amount' => $discount->amount = $discount->amount - ONE,
                ]);
            }

            $data = [
                'user' => $user,
                'carts' => $carts,
                'discount_price' => $session_discount['discount_price'],
                'total_price' => $session_discount['total_price'],
                'money_paid' => $session_discount['money_paid'],
                'other_address' => $request->input('other_address'),
                'note' => $request->input('note'),
            ];

            Mail::send('mail.mail_bill_customer', $data, function ($message) use ($user) {
                $message->to($user->email, $user->name)->subject(__('messages.[RUBY]-order'));
                $message->from(config('app.mail_user'), config('app.mail_name'));
            });

            DB::commit();
            session()->forget(md5('discount_code'));
            session()->forget(md5('totalPricePayPal'));
            Cart::destroy();
            return redirect()->route('home')->with('success', __('messages.order-success'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}

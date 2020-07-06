<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bill;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StatisticController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->input('date');
        $bills = Bill::where('seller_id', Auth::user()->id)
            ->when($date, function ($qr) use ($date) {
                $qr->whereDate('updated_at', $date);
            })->get();
        $price_bill = $bills->sum('price');
        $total_bill = $bills->count();
        $products = Product::where('created_by', Auth::user()->id)->withCount('billDetail')->latest('bill_detail_count')->take(EIGHT)->get();
        $count_product_bill = [];
        if ($bills) {
            foreach ($bills as $bill) {
                foreach ($bill->billDetail as $bill_detail) {
                    if ($count_product_bill != []) {
                        if ($bill_detail->product_id != $count_product_bill['product_id']) {
                            $count_product_bill[] = [
                                'product_id' => $bill_detail->product_id,
                                'qty' => $bill_detail->qty,
                            ];
                        } else {
                            $count_product_bill['qty'] = $count_product_bill['qty'] + $bill_detail->qty;
                        }
                    } else {
                        $count_product_bill[] = [
                            'product_id' => $bill_detail->product_id,
                            'qty' => $bill_detail->qty,
                        ];
                    }
                }
            }
        }
        dd($count_product_bill);
        $data = [
            'date' => $date,
            'price_bill' => $price_bill,
            'total_bill' => $total_bill,
            'products' => $products
        ];
        dd($data);
        return view('admin.statistic.index', $data);
    }
}

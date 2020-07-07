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
        $count_products = Product::where('created_by', Auth::user()->id)->count();
        $products = Product::where('created_by', Auth::user()->id)
            ->when($date, function ($qr) use ($date) {
                $qr->whereDate('updated_at', $date);
            })
            ->latest('updated_at')->get();
        $count_product_to_bills = Product::where('created_by', Auth::user()->id)
            ->when($date, function ($qr) use ($date) {
                $qr->whereDate('updated_at', $date);
            })
            ->withCount('billDetail')
            ->latest('bill_detail_count')
            ->take(EIGHT)
            ->get();
        $count_product_bills = [];
        if ($products) {
            foreach ($products as $product) {
                foreach ($product->billDetail as $bill_detail) {
                    $count_product_bills[] = [
                        'product_name' => $product->name,
                        'product_qty' => +$bill_detail->qty,
                        'updated_at' => $bill_detail->updated_at,
                    ];
                }
            }
        }
//        dd($count_product_bills);
        $data = [
            'date' => $date,
            'price_bill' => $price_bill,
            'total_bill' => $total_bill,
            'count_product_to_bills' => $count_product_to_bills,
            'count_product_bills' => $count_product_bills,
            'count_products' => $count_products
        ];

        return view('admin.statistic.index', $data);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bill;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::where('created_by', Auth::user()->id)->get();
        $bills = Bill::where('seller_id', Auth::user()->id)->get();
        $sum_likes = $products->sum('likes');
        $sum_views = $products->sum('views');
        $count_product = $products->count();
        $count_bill = $bills->count();
        $count_bill_are_pending = $bills->where('status', ZERO)->count();
        $count_bill_complete = $bills->where('status', THREE)->count();
        $count_bill_cancel = $bills->where('status', SIX)->count();
        $sum_price = $bills->where('status', THREE)->sum('price');
        $discounts = Discount::where('created_by', Auth::user()->id)->get();
        $date = [];
        $price = [];
        $data_sets = [];
        $date_discounts = [];

        foreach ($discounts as $discount) {
            $date_discounts[] = $discount->created_at->format('d-m-Y');
            $data_sets [] = [
                [
                    'label' => 'use',
                    'backgroundColor' => 'red',
                    'data' => [$discount->use]
                ],
                [
                    'label' => 'amount',
                    'backgroundColor' => 'green',
                    'data' => [$discount->amount]
                ]
            ];
        }
//        dd(\GuzzleHttp\json_encode($data_sets));
//        dd($discounts);

        foreach ($bills as $bill) {
            if ($bill->status === THREE) {
                $date[] = $bill->updated_at->format('d-m-Y');
                $price[] = $bill->price;
            }
        }
        $data = [
            'sum_likes' => $sum_likes,
            'sum_views' => $sum_views,
            'count_product' => $count_product,
            'count_bill' => $count_bill,
            'count_bill_are_pending' => $count_bill_are_pending,
            'count_bill_complete' => $count_bill_complete,
            'count_bill_cancel' => $count_bill_cancel,
            'sum_price' => $sum_price,
            'date' => json_encode($date),
            'price' => json_encode($price),
            'data_sets' => json_encode($data_sets),
            'date_discounts' => json_encode($date_discounts),
        ];

        return view('admin.dashboard.index', $data);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bill;
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



        $data = [
            'sum_likes' => $sum_likes,
            'sum_views' => $sum_views,
            'count_product' => $count_product,
            'count_bill' => $count_bill,
            'count_bill_are_pending' => $count_bill_are_pending,
            'count_bill_complete' => $count_bill_complete,
            'count_bill_cancel' => $count_bill_cancel,
            'sum_price' => $sum_price,
        ];

        return view('admin.dashboard.index', $data);
    }
}

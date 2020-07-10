<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bill;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StatisticController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:statistics', ['only' => ['index']]);
    }

    public function index(Request $request)
    {
        $date = $request->input('date');
        $bills = Bill::getBillStatistic($date);
        $price_bill = $bills->sum('price');
        $total_bill = $bills->count();
        $count_products = Product::countProductStatistic();
        $all_products = Product::getProductStatistic();
        $products = Product::getAllProductStatistic($date);
        $rate_products = $products->take(TWELVE);
        $count_product_to_bills = Product::countProductToBill($date);
        $star_shop = FIVE;
        $count_rate = ZERO;
        $count_star = ZERO;
        foreach ($all_products as $all_product) {
            foreach ($all_product->rate as $rate) {
                $count_star += $rate->star;
                $count_rate += $all_product->rate->count();
            }
        }
        if ($count_rate != ZERO && $count_star != ZERO) {
            $star_shop = round($count_star / $count_rate, ONE);
        }
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
        $data = [
            'date' => $date,
            'price_bill' => $price_bill,
            'total_bill' => $total_bill,
            'products' => $products,
            'count_product_to_bills' => $count_product_to_bills,
            'count_product_bills' => $count_product_bills,
            'count_products' => $count_products,
            'rate_products' => $rate_products,
            'star_shop' => $star_shop,
            'count_rate' => $count_rate
        ];

        return view('admin.statistic.index', $data);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StatisticController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->input('date');
        $price_bill = Bill::where('seller_id', Auth::user()->id)
           ->sum('price');
        return view('admin.statistic.index');
    }
}

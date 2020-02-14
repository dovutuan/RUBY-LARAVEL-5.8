<?php

namespace App\Http\Controllers\Admin;

use App\Models\Discount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscountController extends Controller
{
    public function index(Request $request)
    {
        try {
            $key = $request->input('key');
            $discounts = Discount::search($key);
            $totalDiscount = $discounts->count();

//            $discounts->start = Carbon::

            return view('admin.discount.index', compact('discounts', 'totalDiscount', 'key'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

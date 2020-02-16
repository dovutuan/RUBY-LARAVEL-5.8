<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DiscountRequest;
use App\Models\Discount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscountController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:discount-list', ['only' => ['index']]);
        $this->middleware('permission:discount-create', ['only' => ['index', 'store']]);
        $this->middleware('permission:discount-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:discount-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        try {
            $key = $request->input('key');
            $discounts = Discount::search($key);
            $totalDiscount = $discounts->count();
            $data = [
                'discounts' => $discounts,
                'totalDiscount' => $totalDiscount,
                'key' => $key,
            ];
            return view('admin.discount.index', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function store(DiscountRequest $request)
    {
        Discount::create([
            'name' => $request->input('name'),
            'code' => strtoupper(str_random(5)),
            'price' => $request->input('price'),
            'amount' => $request->input('amount'),
            'start' => $request->input('start'),
            'finish' => $request->input('finish'),
        ]);
        return redirect()->back()->with('success', __('messages.create-successfully'));
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

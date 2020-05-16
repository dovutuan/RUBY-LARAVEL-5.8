<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BillController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:bill-list|bill-edit', ['only' => ['index']]);
        $this->middleware('permission:bill-create', ['only' => ['index', 'store']]);
        $this->middleware('permission:bill-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:bill-detail', ['only' => ['detail']]);
        $this->middleware('permission:bill-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        try {
            $key = $request->input('key');
            $bills = Bill::search($key);
            $totalBill = $bills->count();
            $data = [
                'bills' => $bills,
                'totalBill' => $totalBill,
                'key' => $key,
            ];

            return view('admin.bill.index', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}

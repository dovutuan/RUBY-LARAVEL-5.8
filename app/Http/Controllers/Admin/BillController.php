<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BillController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:bill-list|bill-edit', ['only' => ['index', 'changeStatus']]);
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

    public function changeStatus($id)
    {
        $bill = Bill::findOrFail($id);
        switch ($bill->status) {
            case ZERO :
                $bill->update(['status' => ONE]);
                break;
            case ONE :
                $bill->update(['status' => TWO]);
                break;
            case TWO :
                $bill->update(['status' => THREE]);
                break;
        }
        return back()->with('success', __('messages.update-successfully'));
    }

    public function detail($id)
    {
        $bill = Bill::findOrFail($id);
        $data = [
            'bill' => $bill,
        ];
        return view('admin.bill.show', $data);

    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:supplier-list', ['only' => ['index']]);
        $this->middleware('permission:supplier-create', ['only' => ['index', 'store']]);
        $this->middleware('permission:supplier-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:supplier-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $key = $request->input('key');
        $suppliers = Supplier::search($key);
        $totalSupplier = $suppliers->count();
        $data = [
            'suppliers' => $suppliers,
            'totalSupplier' => $totalSupplier,
            'key' => $key,
        ];

        return view('admin.supplier.index', $data);
    }

    public function store(SupplierRequest $request)
    {
        Supplier::create(
            array_merge($request->all(), [
                'created_by' => Auth::user()->id,
            ])
        );

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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $suppliers = Supplier::all();
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
        Supplier::create([
            'name' => $request->input('name'),
            'company' => $request->input('company'),
            'phone' => $request->input('phone'),
            'fax' => $request->input('fax'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
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

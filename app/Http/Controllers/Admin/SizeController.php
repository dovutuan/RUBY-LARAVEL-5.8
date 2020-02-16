<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SizeRequest;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SizeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:size-list', ['only' => ['index']]);
        $this->middleware('permission:size-create', ['only' => ['index', 'store']]);
        $this->middleware('permission:size-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:size-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        try {
            $key = $request->input('key');
            $sizes = Size::search($key);
            $totalSize = $sizes->count();
            $data = [
                'sizes' => $sizes,
                'totalSize' => $totalSize,
                'key' => $key,
            ];

            return view('admin.size.index', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function store(SizeRequest $request)
    {
        Size::create([
            'name' => $request->input('name'),
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
        $size = Size::findOrFail($id);
        $size->update([
            'deleted_by' => Auth::user()->name,
        ]);
        $size->delete();
        return redirect()->back()->with('success', __('messages.delete-successfully'));
    }
}

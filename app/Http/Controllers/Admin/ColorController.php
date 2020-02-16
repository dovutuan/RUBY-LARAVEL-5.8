<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ColorController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:color-list', ['only' => ['index']]);
        $this->middleware('permission:color-create', ['only' => ['index', 'store']]);
        $this->middleware('permission:color-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:color-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        try {
            $key = $request->input('key');
            $colors = Color::search($key);
            $totalColor = $colors->count();
            $data = [
                'colors' => $colors,
                'totalColor' => $totalColor,
                'key' => $key,
            ];

            return view('admin.color.index', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function store(ColorRequest $request)
    {
       Color::create([
           'name' => $request->input('name'),
           'code' => $request->input('code'),
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
        $color = Color::findOrFail($id);
        $color->update([
            'deleted_by' => Auth::user()->name,
        ]);
        $color->delete();
        return redirect()->back()->with('success', __('messages.delete-successfully'));
    }
}

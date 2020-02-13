<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PermissionRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:permission-list', ['only' => ['index']]);
        $this->middleware('permission:permission-create', ['only' => ['index', 'store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        try {
            $key = $request->input('key');
            $permissions = Permission::search($key);

            return view('admin.permission.index', compact('permissions', 'key'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function store(PermissionRequest $request)
    {
        Permission::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->back()->with('success', __('messages.create-successfully'));
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('admin.permission.edit', compact('permission'));
    }

    public function update(PermissionRequest $request, $id)
    {
        $permission = Permission::find($id);
        $permission->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('list.permission')->with('success', __('messages.update-successfully'));
    }

    public function destroy($id)
    {
        Permission::findOrFail($id)->delete();
        return redirect()->back()->with('success', __('messages.delete-successfully'));
    }
}

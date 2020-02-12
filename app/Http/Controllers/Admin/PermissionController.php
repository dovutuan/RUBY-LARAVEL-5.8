<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PermissionRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
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
}

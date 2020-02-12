<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        try {
            $key = $request->input('key');

            $permissions = Permission::all();
            $roles = Role::search($key);

            $totalRole = $roles->count();

            return view('admin.role.index', compact('roles', 'totalRole', 'permissions', 'key'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        $role = Role::create([
            'name' => $request->input('name')
        ]);

        $role->syncPermissions($request->input('permission_id'));

        return redirect()->back()->with('success', 'Role created successfully');
    }
}

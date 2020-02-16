<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:role-list', ['only' => ['index']]);
        $this->middleware('permission:role-create', ['only' => ['index', 'store']]);
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
            $data = [
                'permissions' => $permissions,
                'roles' => $roles,
                'totalRole' => $totalRole,
                'key' => $key,
            ];

            return view('admin.role.index', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function store(RoleRequest $request)
    {
        $role = Role::create([
            'name' => $request->input('name')
        ]);

        $role->permissions()->sync($request->input('permission_id'));

        return redirect()->back()->with('success', 'Role created successfully');
    }

    public function edit($id)
    {
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')->all();

        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        return view('admin.role.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(RoleRequest $request, $id)
    {
        $role = Role::find($id);

        $role->update([
            'name' => $request->input('name'),
        ]);

        $role->permissions()->sync($request->input('permission_id'));

        return redirect()->route('list.role')->with('success', __('messages.update-successfully'));
    }

    public function destroy($id)
    {
        Role::findOrFail($id)->delete();
        return redirect()->back()->with('success', __('messages.delete-successfully'));
    }
}

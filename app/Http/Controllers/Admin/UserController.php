<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:user-list|user-edit', ['only' => ['index']]);
        $this->middleware('permission:user-create', ['only' => ['index', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        try {
            $roles = Role::all();
            $key = $request->input('key');
            $users = User::search($key);
            $totalUser = $users->count();

            return view('admin.user.index', compact('users', 'totalUser', 'key', 'roles'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function store(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'status' => $request->input('status'),
            'gender' => $request->input('gender'),
            'birth' => $request->input('birth'),
            'address' => $request->input('address'),
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make($request->input('password')),
        ]);

        $user->assignRole($request->input('role_id'));

        return redirect()->back()->with('success', __('messages.create-successfully'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        $roles = Role::all();

        $userRoles = $user->roles->pluck('name', 'name')->all();

        return view('admin.user.edit', compact('user', 'roles', 'userRoles'));
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'status' => $request->input('status'),
            'gender' => $request->input('gender'),
            'birth' => $request->input('birth'),
            'address' => $request->input('address'),
        ]);

        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('role_id'));

        return redirect()->route('list.user')->with('success', __('messages.update-successfully'));
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->delete();

        return redirect()->back()->with('success', __('messages.delete-successfully'));
    }

    public function refreshPassword($id, $password = 'ruby12345')
    {
        $user = User::findOrFail($id);
        $user->update([
            'password' => Hash::make($password),
        ]);

        return redirect()->back()->with('success', __('messages.update-password-successfully'));
    }

    public function changeStatus($id)
    {
        $users = User::findOrFail($id);
        $users->update([
            'status' => $users->status ? 0 : 1,
        ]);
        return redirect()->back()->with('success', __('messages.update-successfully'));
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back()->with('success', __('messages.delete-successfully'));
    }
}

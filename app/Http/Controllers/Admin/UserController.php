<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        try {
            $roles = Role::all();
            $key = $request->input('key');
            $users = User::search($key);
            $totalUser = $users->count();

            return view('admin.user.index', compact('users', 'totalUser', 'key'));
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

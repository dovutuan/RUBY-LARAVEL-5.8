<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index(Request $request)
    {
        try {
            $key = $request->input('key');
            $users = User::search($key);
            $totalUser = $users->count();

            return view('admin.user.index', compact('users', 'totalUser', 'key'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
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

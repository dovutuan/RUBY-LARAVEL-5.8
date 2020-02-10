<?php

namespace App\Http\Controllers\Account;

use App\Http\Requests\ChangeInfomationRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function editChangeInformation()
    {
        $user = Auth::user();

        return view('account.change_information', compact('user'));
    }

    public function updateChangeInformation(ChangeInfomationRequest $request)
    {
        $user = Auth::user();

        $user->update($request->all());

        return redirect()->back()->with('success', 'Successfully change information');
    }

    public function editChangePassword()
    {
        $user = Auth::user();

        return view('account.change_password', compact('user'));
    }

    public function updateChangePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();

        $user->update($request->all());

        return redirect()->back()->with('success', 'Successfully change password');
    }
}

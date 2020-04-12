<?php

namespace App\Http\Controllers\Account;

use App\Http\Requests\ChangeInfomationRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\AddressUser;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $user->phone = substr($user->phone, ZERO, THREE) . '*****' . substr($user->phone, -THREE);

        return view('account.index', compact('user'));
    }

    public function editChangeInformation()
    {
        $user = Auth::user();

        return view('account.change_information', compact('user'));
    }

    public function updateChangeInformation(ChangeInfomationRequest $request)
    {
        $user = Auth::user();

        $user->update($request->all());
        AddressUser::create([
            'user_id' => $user->id,
            'address' => $request->input('address'),
        ]);

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

    public function createMiniShop()
    {
        $user = Auth::user();

        return view('account.create_mini_shop', compact('user'));
    }

    public function SeedMailCreateMiniShop()
    {
        $user = Auth::user();

        Mail::send('account.seed_create_mini_shop', compact('user'), function($message) use ($user) {
            $message->to(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'))->subject
            ('Tạo mini shop');
            $message->from($user->email, $user->name);
        });

        return redirect()->back()->with('success', 'Successfully change password');
    }
}

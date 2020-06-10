<?php

namespace App\Http\Controllers\Account;

use App\Http\Requests\ChangeInfomationRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\AddressUser;
use App\Models\Bill;
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

        Mail::send('account.seed_create_mini_shop', compact('user'), function ($message) use ($user) {
            $message->to(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'))->subject
            ('Tạo mini shop');
            $message->from($user->email, $user->name);
        });

        return redirect()->back()->with('success', 'Successfully change password');
    }

    public function bill()
    {
        $bills = Bill::where('created_by', Auth::user()->id)->paginate(PAGINATE);
        $data = [
            'bills' => $bills,
        ];
        return view('account.bill', $data);
    }

    public function billDetail($id)
    {
        $bill = Bill::findOrFail($id);
        $data = [
            'bill' => $bill,
        ];
        return view('account.bill_detail', $data);
    }

    public function cancelBill($id)
    {
        $bill = Bill::where('id', $id)->where('created_by', Auth::user()->id)->first();
        if ($bill->status === ZERO || $bill->status === ONE) {
            $bill->update(['status' => SIX]);
            return back()->with('success', __('messages.update-successfully'));
        } else {
            return back()->with('warning', __('messages.some-error-occur'));
        }
    }

    public function printBill($id)
    {
        $bill = Bill::where('id', $id)->where('created_by', Auth::user()->id)->first();
        if ($bill) return view('account.print_bill', compact('bill'));
        else return back()->with('warning', __('messages.some-error-occur'));
    }
}

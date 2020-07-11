<?php

namespace App\Http\Controllers\Auth;

use App\Models\AddressUser;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255|unique:users,name',
            'birth' => 'required',
            'phone' => 'required|max:12',
            'address' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|confirmed|min:6|max:255',
        ]);
    }

    protected function create(array $data)
    {
        $role = [];
        $roles = Role::where('name', 'Customer')->orWhere('name', 'customer')->get();
        foreach ($roles as $role) {
            $role = $role->id;
        }

        $user = User::create([
            'name' => $data['name'],
            'birth' => $data['birth'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        AddressUser::create([
            'user_id' => $user->id,
            'address' => $data['address'],
        ]);

        $user->assignRole($role);

        return $user;
    }
}

<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate([
            'name' => 'Admin',
            'phone' => '0987654321',
            'address' => 'HN',
            'gender' => 0,
            'status' => 1,
            'email' => 'Admin@gmail.com',
            'email_verified_at'=>Carbon::now(),
            'password' => Hash::make('ruby12345'),
        ]);
    }
}

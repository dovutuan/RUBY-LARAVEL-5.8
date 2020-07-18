<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
//        $user = User::updateOrCreate([
//            'name' => 'Admin',
//            'phone' => '0987654321',
//            'address' => 'HN',
//            'gender' => 0,
//            'status' => 1,
//            'email' => 'admin@gmail.com',
//            'email_verified_at'=>Carbon::now(),
//            'password' => Hash::make('ruby12345'),
//        ]);
//
//        $role = Role::create(['name' => 'Admin']);
//
//        $permissions = Permission::pluck('id','id')->all();
//
//        $role->syncPermissions($permissions);
//
//        $user->assignRole([$role->id]);


        $faker = Faker\Factory::create();

        $limit = 10000;

        for ($i = 0; $i < $limit; $i++) {
            User::updateOrCreate([
                'name' => $faker->name,
                'phone' => (int)$faker->phoneNumber,
                'address' => $faker->address,
                'gender' => 2,
                'status' => 1,
                'email' => $faker->unique()->email,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('ruby12345'),
            ]);
        }
    }
}

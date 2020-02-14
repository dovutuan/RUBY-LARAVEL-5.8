<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SizesTableSeeder::class);
        $this->call(ColorsTableSeeder::class);
        $this->call(DiscountsTableSeeder::class);
    }
}

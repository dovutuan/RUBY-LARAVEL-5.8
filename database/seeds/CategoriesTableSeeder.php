<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
         \App\Models\Category::updateOrCreate([
            'name' => 'Quần',
        ]);
    }
}

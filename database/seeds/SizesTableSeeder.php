<?php

use Illuminate\Database\Seeder;

class SizesTableSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Size::updateOrCreate([
            'name' => 'S',
        ]);
        \App\Models\Size::updateOrCreate([
            'name' => 'M',
        ]);
        \App\Models\Size::updateOrCreate([
            'name' => 'L',
        ]);
        \App\Models\Size::updateOrCreate([
            'name' => 'XL',
        ]);
        \App\Models\Size::updateOrCreate([
            'name' => 'XXL',
        ]);
        \App\Models\Size::updateOrCreate([
            'name' => '27',
        ]);
    }
}

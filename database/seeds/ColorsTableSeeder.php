<?php

use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Color::updateOrCreate([
            'name' => 'Trắng',
            'code' => '#ffffff'
        ]);
    }
}

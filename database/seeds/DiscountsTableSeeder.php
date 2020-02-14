<?php

use Illuminate\Database\Seeder;

class DiscountsTableSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Discount::updateOrCreate([
            'name' => 'Test',
            'code' => strtoupper(str_random(10)),
            'price' => '10000',
            'amount' => '20',
            'start' => \Carbon\Carbon::now(),
            'finish' => \Carbon\Carbon::now(),
        ]);
    }
}

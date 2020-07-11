<?php

namespace App\Console\Commands;

use App\Models\Discount;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ChangeStatusDiscount extends Command
{
    protected $signature = 'changeStatus:discount';
    protected $description = 'Change status discount';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $discounts = Discount::all();
        foreach ($discounts as $discount) {
            $now = Discount::formatTime(Carbon::now(), 'd-m-Y');
            $finish = Discount::formatTime($discount->finish, 'd-m-Y');
            if ($finish < $now || $discount->amount <= ZERO) {
                $discount->update([
                    'status' => OUT_STOCK,
                ]);
            }
            \Log::info("running finnish < now or amount <=0 in discount");
        }
    }
}

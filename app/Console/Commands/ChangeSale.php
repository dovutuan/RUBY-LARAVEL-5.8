<?php


namespace App\Console\Commands;

use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ChangeSale extends Command
{
    protected $signature = 'change:sale';
    protected $description = 'Change sale product';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $sales = Sale::all();
        foreach ($sales as $sale) {
            $now = Sale::formatTime(Carbon::now(), 'd-m-Y');
            $finish = Sale::formatTime($sale->finish, 'd-m-Y');
            if ($finish < $now) {
                $sale->delete();
            }
            \Log::info("running finnish < now in sale of product");
        }
    }
}

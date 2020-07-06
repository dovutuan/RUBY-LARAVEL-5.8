<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnsToBillsTable extends Migration
{
    public function up()
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->foreign('seller_id')->references('id')->on('users');
            $table->double('discount_price')->nullable()->after('discount_code');
        });
    }

    public function down()
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->dropForeign('seller_id');
            $table->dropColumn('discount_price');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumToOptionProductsTable extends Migration
{
    public function up()
    {
        Schema::table('option_products', function (Blueprint $table) {
            $table->bigInteger('supplier_id')->unsigned();
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->double('price', 20)->nullable();
            $table->bigInteger('amount')->default(0);
            $table->bigInteger('pay')->default(0);
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('option_products', function (Blueprint $table) {
            $table->dropColumn(['price', 'amount', 'pay', 'supplier_id', 'updated_by', 'deleted_by']);
        });
    }
}

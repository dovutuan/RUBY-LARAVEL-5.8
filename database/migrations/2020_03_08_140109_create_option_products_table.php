<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionProductsTable extends Migration
{
    public function up()
    {
        Schema::create('option_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->bigInteger('supplier_id')->unsigned();
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->bigInteger('species_id')->unsigned();
            $table->foreign('species_id')->references('id')->on('species');
            $table->double('price', 20)->nullable();
            $table->bigInteger('amount')->default(0);
            $table->bigInteger('pay')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('option_products');
    }
}

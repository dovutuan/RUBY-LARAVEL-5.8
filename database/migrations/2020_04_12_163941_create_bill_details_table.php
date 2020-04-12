<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('bill_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bill_id')->unsigned();
            $table->foreign('bill_id')->references('id')->on('bills')->onDelete('cascade');
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('amount')->default(0)->nullable();
            $table->double('price')->default(0)->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bill_details');
    }
}

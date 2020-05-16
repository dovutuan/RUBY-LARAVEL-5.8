<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('discount_id')->unsigned()->nullable();
            $table->string('discount_name')->nullable();
            $table->string('discount_code')->nullable();
            $table->double('price')->default(0)->nullable();
            $table->double('tax_rate')->default(0)->nullable();
            $table->tinyInteger('status')->default(0)->nullable();
            $table->text('address')->nullable();
            $table->text('note')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bills');
    }
}

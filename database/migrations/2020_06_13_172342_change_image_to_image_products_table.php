<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeImageToImageProductsTable extends Migration
{
    public function up()
    {
        Schema::table('image_products', function (Blueprint $table) {
            $table->longText('image')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('image_products', function (Blueprint $table) {
            $table->string('image')->nullable();
        });
    }
}

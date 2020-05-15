<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeSpeciesIdToBillDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('bill_details', function (Blueprint $table) {
            $table->dropColumn('specie_id');
            $table->bigInteger('species_id')->unsigned()->after('product_id');
        });
    }

    public function down()
    {
        Schema::table('bill_details', function (Blueprint $table) {
            $table->bigInteger('specie_id')->unsigned()->after('product_id');
            $table->dropColumn('species_id');
        });
    }
}

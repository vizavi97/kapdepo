<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePnlDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pnl_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kzl');
            $table->string('isin');
            $table->string('action');
            $table->string('date');
            $table->string('quantity_items');
            $table->string('price_items');
            $table->string('net_sum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pnl_data');
    }
}

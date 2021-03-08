<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStartTradingSteps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('start_trading_steps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('position')->nullable(false);
            $table->string('lang')->default('ru');
            $table->string('title')->nullable()->change();
            $table->string('text')->nullable()->change();
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
        Schema::dropIfExists('start_trading_steps');
    }
}

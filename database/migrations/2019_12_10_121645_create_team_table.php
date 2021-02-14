<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team', function (Blueprint $table) {
            $table->increments('id');
            $table->string('surname');
            $table->string('name');
            $table->string('patronymic')->nullable();
            $table->string('position');
            $table->string('photo');
            $table->string('phone_one');
            $table->string('phone_two')->nullable();
            $table->string('email');
            $table->string('lang');
            $table->integer('person_id')->nullable();
            $table->integer('order')->nullable();
            $table->tinyInteger('public')->default(0);
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
        Schema::dropIfExists('team');
    }
}

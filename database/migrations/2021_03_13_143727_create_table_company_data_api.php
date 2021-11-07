<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCompanyDataApi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies_data_api', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('company_id');
            $table->integer('year');
            $table->integer('quarter');
            $table->string('unallocatedProfits');
            $table->string('commitments');
            $table->string('longLine');
            $table->string('shortLine');
            $table->string('proceeds');
            $table->string('profit');
            $table->string('moneyResources');
            $table->string('activesOnStart');
            $table->string('activesOnEnd');
            $table->string('capitalOnStart');
            $table->string('capitalOnEnd');
            $table->string('faceValue');
            $table->string('stock');
            $table->string('preference');
            $table->string('dividends');
            $table->string('ebit');
            $table->string('liquidityIndicator')->default('normal');
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
        Schema::dropIfExists('companies_data_api');
    }
}

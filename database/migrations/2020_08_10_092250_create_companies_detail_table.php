<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies_detail', function (Blueprint $table) {
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->string('common_stocks')->nullable();
            $table->string('p_e')->nullable();
            $table->string('p_b')->nullable();
            $table->string('dividend')->nullable();
            $table->string('capitalization')->nullable();
            $table->string('preference')->nullable();
            $table->string('face')->nullable();
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
        Schema::table('companies_detail', function (Blueprint $table) {
            $table->dropForeign('companies_detail_company_id_foreign');
        });
        Schema::dropIfExists('companies_detail');
    }
}

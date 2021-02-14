<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->string('lang');
            $table->text('desc')->nullable();
            $table->string('site')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('sector')->nullable();
            $table->string('industry')->nullable();


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
//        Schema::table('companies_info', function (Blueprint $table) {
//            $table->dropForeign('companies_info_company_id_foreign');
//        });
        Schema::dropIfExists('companies_info');
    }
}

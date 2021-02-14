<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
//use DB;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('isin');
            $table->string('issuer');
            $table->string('image');
//            $table->text('body');
//            $table->string('lang');
//            $table->integer('parent_id')->nullable();
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
//        Schema::dropIfExists('companies');
//        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
//        Schema::dropIfExists('buh_dictionary')
//        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
//        Schema::drop('companies');
        Schema::table('companies_data', function (Blueprint $table) {
            $table->dropForeign('companies_data_company_id_foreign');
        });
        Schema::table('companies_detail', function (Blueprint $table) {
            $table->dropForeign('companies_detail_company_id_foreign');
        });
        Schema::table('companies_info', function (Blueprint $table) {
            $table->dropForeign('companies_info_company_id_foreign');
        });
        Schema::dropIfExists('companies');

    }
}

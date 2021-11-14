<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->increments("id");
            $table->string("nameCompany")->nullable();
            $table->string("officeAddress")->nullable();
            $table->string("logo")->nullable();
            $table->string('website')->null();
            $table->longText('aboutCompany')->null();
            $table->integer("scale")->comment("Quy mô công ty")->default(1);
            $table->string("career_id")->nullable();
            $table->string("welfare_id")->nullable();
            $table->integer("vip")->default(0);
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
        Schema::dropIfExists('companies');
    }
}

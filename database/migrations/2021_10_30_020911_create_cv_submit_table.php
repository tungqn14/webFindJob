<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvSubmitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv_submit', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name")->nullable();
            $table->string("telephone")->nullable();
            $table->string("email")->nullable();
            $table->integer("post_submit_id")->nullable();
            $table->string("cv")->nullable();
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
        Schema::dropIfExists('cv_submit');
    }
}

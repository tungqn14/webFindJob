<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
//            $table->increments("id_post");
//            $table->longText("desPost")->nullable();
//            $table->longText("reqPost")->nullable();
//            $table->string("typeTimePost")->nullable();
//            $table->string("deadline")->nullable();
//            $table->string("wage")->nullable();
//            $table->integer("quantity")->default(0);
//            $table->string("titlePost")->nullable();
//            $table->string("rankPost")->nullable();
//            $table->string("tech_id");
//            $table->integer("user_id");
//            $table->softDeletes();
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

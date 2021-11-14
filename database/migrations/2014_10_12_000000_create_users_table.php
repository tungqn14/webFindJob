<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments("id");
            $table->string('fullName')->nullable();
            $table->string('email')->unique();
            $table->string('birthDay')->nullable();
            $table->string('password');
            $table->tinyInteger('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('desiredMoney')->nullable()->comment("Tiền mong muốn");
            $table->string('avatar')->nullable();
            $table->string('exp')->nullable();
            $table->string('rankUser')->comment("Cấp bậc của nhân viên hiện nay :Nhân viên,giám đốc")->nullable();
            $table->text('descripYourself')->comment("Mô tả bản thân")->nullable();
            $table->string('position')->comment("frontend developer hay backend")->nullable();
            $table->string('cv')->nullable();
            $table->string('typeTimeUser')->comment("Thời gian làm fulltime hay ko")->nullable();
            $table->tinyInteger('user_level')->comment("Phân quyền người dùng: 0 : Admin,1:HR,2:ứng viên ")->default(2);
            $table->integer('company_id')->comment("Thuộc về công ty nào")->nullable();
            $table->rememberToken()->nullable();
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
        Schema::dropIfExists('users');
    }
}

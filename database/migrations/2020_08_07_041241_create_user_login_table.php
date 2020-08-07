<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_login_tbl', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('user_id');
            $table->boolean('status')->nullable();
            $table->dateTime('login_time')->nullable();
            $table->dateTime('logout_time')->nullable();
            $table->string('ip_login')->nullable();
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
        Schema::dropIfExists('user_login_tbl');
    }
}

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
        Schema::create('users_tbl', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('username');
            $table->string('password');
            $table->string('fullname')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('identity_card')->nullable();
            $table->string('issue_place')->nullable();
            $table->dateTime('issue_date')->nullable();
            $table->string('university')->nullable();
            $table->string('year_of_graduate')->nullable();
            $table->dateTime('start_job_at_company')->nullable();
            $table->dateTime('birthday')->nullable();
            $table->string('avatar')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('users_tbl');
    }
}

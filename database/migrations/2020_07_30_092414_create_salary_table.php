<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_tbl', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('user_id');
            $table->double('basic_salary')->nullable();
            $table->integer('number_day_work')->nullable();
            $table->double('total_salary')->nullable();
            $table->dateTime('date_paid')->nullable();
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
        Schema::dropIfExists('salary_tbl');
    }
}

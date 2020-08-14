<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOvertimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('overtime_tbl', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('user_id');
            $table->dateTime('date_ot')->nullable();
            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->string('place_ot')->nullable();
            $table->integer('total_time')->nullable();
            $table->string('task_name')->nullable();
            $table->string('note')->nullable();
            $table->string('take_note')->nullable();
            $table->string('feedback')->nullable();
            $table->boolean('status')->nullable();
            $table->integer('month')->nullable();
            $table->integer('year')->nullable();
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
        Schema::dropIfExists('overtime');
    }
}

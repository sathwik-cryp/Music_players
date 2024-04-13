<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { Schema::create('tasks', function (Blueprint $table) {
        $table->id()->primary();
        $table->unsignedBigInteger('question_id')->references('id')->on('questions');
        $table->text('question');
        $table->text('option1');
        $table->text('option2');
        $table->text('option3');
        $table->text('option4');
        $table->text('correct_option');
        $table->unsignedBigInteger('task_num')->references('id')->on('task_numbers');
        $table->unsignedInteger('time_alloted');
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
        //
        Schema::dropIfExists('tasks');
    }
}

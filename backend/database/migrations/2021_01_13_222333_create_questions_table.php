<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('body',500);
            $table->string('choice_1',100);
            $table->string('choice_2',100);
            $table->string('choice_3',100);
            $table->string('choice_4',100);
            $table->string('answer_body');
            $table->integer('answer_choice');
            $table->integer('status_num');
            $table->foreignId('question_workbook_id')->constrained('question_workbooks');
            $table->foreignId('category_question_id')->constrained('category_questions');
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
        Schema::dropIfExists('questions');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionWorkbookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_workbook', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('workbook_id');
            $table->unsignedBigInteger('question_id');
            $table->timestamps();

            $table->foreign('workbook_id')
                ->references('id')
                ->on('workbooks')
                ->onDelete('cascade');
            $table->foreign('question_id')
                ->references('id')
                ->on('questions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_workbook');
    }
}

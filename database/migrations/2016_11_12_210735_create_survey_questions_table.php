<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_survey', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('survey_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->timestamps();

            $table->foreign('survey_id')->references('id')->on('surveys');
            $table->foreign('question_id')->references('id')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('question_survey', function($table)
        {
            $table->dropForeign('question_survey_survey_id_foreign');
            $table->dropForeign('question_survey_question_id_foreign');
        });

        Schema::dropIfExists('question_survey');
    }
}

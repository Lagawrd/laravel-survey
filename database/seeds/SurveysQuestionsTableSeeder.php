<?php

use Illuminate\Database\Seeder;
use App\Models\Survey;
use App\Models\Question;

class SurveysQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $survey = Survey::where('unique_title', 'well_being')->first();
        $question_a = Question::where('question', 'How do you feel today?')->first();
        $question_b = Question::where('question', 'What did you do today?')->first();
        $question_c = Question::where('question', 'What did you have for breakfast?')->first();

        $surveys_questions = [
        	['survey_id' => $survey->id, 'question_id' => $question_a->id],
        	['survey_id' => $survey->id, 'question_id' => $question_b->id],
        	['survey_id' => $survey->id, 'question_id' => $question_c->id],
        ];

        DB::table('question_survey')->insert($surveys_questions);
    }
}

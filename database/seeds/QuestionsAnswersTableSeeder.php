<?php

use Illuminate\Database\Seeder;
use App\Models\Answer;
use App\Models\Question;

class QuestionsAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Question 1
    	$question = Question::where('question', 'How do you feel today?')->first();
    	$ans_a = Answer::where('answer', 'Horrible')->first();
    	$ans_b = Answer::where('answer', 'Okay')->first();
    	$ans_c = Answer::where('answer', 'Excellent')->first();

		$questions_answers[] = ['question_id' => $question->id, 'answer_id' => $ans_a->id];
		$questions_answers[] = ['question_id' => $question->id, 'answer_id' => $ans_b->id];
		$questions_answers[] = ['question_id' => $question->id, 'answer_id' => $ans_c->id];

        // Question 2
    	$question = Question::where('question', 'What did you do today?')->first();
    	$ans_a = Answer::where('answer', 'Played')->first();
    	$ans_b = Answer::where('answer', 'Worked')->first();
    	$ans_c = Answer::where('answer', 'Relaxed')->first();

    	$questions_answers[] = ['question_id' => $question->id, 'answer_id' => $ans_a->id];
		$questions_answers[] = ['question_id' => $question->id, 'answer_id' => $ans_b->id];
		$questions_answers[] = ['question_id' => $question->id, 'answer_id' => $ans_c->id];

        // Questions 3
    	$question = Question::where('question', 'What did you have for breakfast?')->first();
    	$ans_a = Answer::where('answer', 'Mostly protein')->first();
    	$ans_b = Answer::where('answer', 'Mostly carbs')->first();
    	$ans_c = Answer::where('answer', 'Mostly vegetables')->first();

    	$questions_answers[] = ['question_id' => $question->id, 'answer_id' => $ans_a->id];
		$questions_answers[] = ['question_id' => $question->id, 'answer_id' => $ans_b->id];
		$questions_answers[] = ['question_id' => $question->id, 'answer_id' => $ans_c->id];

        DB::table('answer_question')->insert($questions_answers);

    }
}

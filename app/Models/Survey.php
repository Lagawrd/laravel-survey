<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Survey extends Model
{
     /**
     * The questions that belong in the survey.
     */
    public function questions()
    {
        return $this->belongsToMany('App\Models\Question');
    }

    /**
     * Returns dictionary data structure of Survey title, questions and possible answers
	 *  	
	 * @return Array [survey_title, questions:[[id, text, answers[[id,text]]]]
     */
    public function getQuestionAnswers() {

    	$questions = $this->questions()->pluck('questions.id')->toArray();
    	$question_ids = implode(',',$questions);
    	

    	$results = DB::table('answer_question')
    		->select(DB::raw('answer_question.id AS answer_question_id, questions.id AS question_id, questions.question AS question, answers.id AS answer_id, answers.answer as answer'))
            ->leftJoin('answers', 'answers.id', '=', 'answer_question.answer_id')
            ->leftJoin('questions', 'questions.id', '=', 'answer_question.question_id')
            ->whereIn('answer_question.question_id', $questions)
            ->get();

    	$question_answers["survey_title"] = $this->title;
    	foreach ( $results as $result ) {

    		$question_answers["questions"][$result->question_id]['id'] = $result->question_id;
    		$question_answers["questions"][$result->question_id]['text'] = $result->question;
    		
    		$question_answers["questions"][$result->question_id]['answers'][$result->answer_id]['answer_question_id'] = $result->answer_question_id;
			$question_answers["questions"][$result->question_id]['answers'][$result->answer_id]['text'] = $result->answer;
    	}

    	return $question_answers;
    }
}

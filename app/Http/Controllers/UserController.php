<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\User;
use App\Models\Question;
use App\Models\Answer;
use Carbon\Carbon;
use Auth;
use DB;

class UserController extends Controller
{
    /**
     * Save answer_question pairs to answer_user table
     *
     * @return \Illuminate\Http\Response
     */
    public function saveAnswers(Request $request)
    {
        $user = User::where('id', Auth::User()->id)->first();
        $data = $request->all();

        $question_answer = [];

        foreach ( $data as $key => $attribute ) {
            if ($key != '_token') {
                $question_answer[] = [
                    'answer_question_id' => $key, 
                    'user_id' => $user->id, 
                    'created_at' => Carbon::now(), 
                    'updated_at' => Carbon::now(),
                ];
                $question_answers[] = $key;
            }
        }

        if (count($question_answer) > 0 ) {
            DB::table('answer_user')->insert($question_answer);
        }

        $answer_questions = DB::table('answer_question')->whereIn('id', $question_answers)->get();

        $response = [];

        foreach ($answer_questions as $answer_question) {
            $question = Question::find($answer_question->question_id);
            $answer = Answer::find($answer_question->answer_id);
            $response[] = [
            'question' => $question->question,
            'answer' => $answer->answer,
            ];
        }
        
        return view('home', compact('response'));

    }
}

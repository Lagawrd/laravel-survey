<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;

class SurveyController extends Controller
{
    /**
     * Return Survey questions and possible answers
     *
     * @return array
     */
    public function show(Request $request, $name)
    {
        $survey = Survey::where('unique_title',$name)->firstOrFail();

        $data = $survey->getQuestionAnswers();

        return view('survey', compact('data'));
    }
}

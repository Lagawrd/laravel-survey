<?php

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$questions = [
    		["question" => "How do you feel today?"],
    		["question" => "What did you do today?"],
    		["question" => "What did you have for breakfast?"],
    	];

    	Question::insert($questions);
    }
}

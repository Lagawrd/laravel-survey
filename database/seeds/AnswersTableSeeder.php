<?php

use Illuminate\Database\Seeder;
use App\Models\Answer;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $answers = [
    		["answer" => "Horrible"],
    		["answer" => "Okay"],
    		["answer" => "Excellent"],
    		["answer" => "Played"],
    		["answer" => "Worked"],
    		["answer" => "Relaxed"],
    		["answer" => "Mostly protein"],
    		["answer" => "Mostly carbs"],
    		["answer" => "Mostly vegetables"],
    	];

    	Answer::insert($answers);
    }
}

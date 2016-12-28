<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(QuestionsTableSeeder::class);
    	$this->call(AnswersTableSeeder::class);
    	$this->call(SurveysTableSeeder::class);
    	$this->call(QuestionsAnswersTableSeeder::class);
    	$this->call(SurveysQuestionsTableSeeder::class);
    }
}

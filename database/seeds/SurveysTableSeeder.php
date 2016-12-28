<?php

use Illuminate\Database\Seeder;
use App\Models\Survey;

class SurveysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Survey::insert([
            'title' => "Your Well Being!",
            'unique_title' => 'well_being',
        ]);
    }
}

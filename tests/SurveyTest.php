<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;
use App\Models\Survey;

class SurveyTest extends TestCase
{
    /**
     * Test survey authentication.
     *
     * @return Exceptiom
     */
    public function testAuthenticated()
    {
    	$survey = Survey::first();

    	// Make sure a 302 is returned when attempting to access survey without logging in
    	$response = $this->call('GET', "/surveys/{$survey->unique_title}");
    	$this->assertEquals(302, $response->status(), "Calling survey when not authenticated returns {$response->status()}");

    	// Now login and attempt to access survey, a 200 is expected.
    	$this->login();

    	$response = $this->call('GET', "/surveys/{$survey->unique_title}");
    	$this->assertEquals(200, $response->status(), "Calling survey when authenticated returns {$response->status()}");
    }

    /**
     * test survey availability.
     *
     * @return Exceptiom
     */
    public function testSurveyAvailablity()
    {
    	$this->login();

    	// Test retrieving non-existent survey and make sure it returns a 404 and not a 500.
    	$survey_name = 'survey title that will never ever be ever';

    	$response = $this->call('GET', "/surveys/{$survey_name}");
    	$this->assertEquals(404, $response->status(), "Calling survey with wrong unique_title returns {$response->status()}");


		// Test retrieving existing survey and make sure it returns a 200.
    	$survey = Survey::first();
    	$response = $this->call('GET', "/surveys/{$survey->unique_title}");
    	$this->assertEquals(200, $response->status(), "Calling survey with correct unique_title returns {$response->status()}");

    }

}

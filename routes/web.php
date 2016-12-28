<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'v1'], function () {

        Route::get('heartbeat', 'HeartbeatController@heartbeat');

});

Auth::routes();

Route::get('/home', 'HomeController@index');

// Surveys
Route::group(['prefix' => 'surveys'], function () {
    Route::get('/{name}', 'SurveyController@show')->name('survey.get')->middleware('auth');
});

// Users
Route::group(['prefix' => 'users'], function () {
    Route::post('/answers', 'UserController@saveAnswers')->name('user.answers.post')->middleware('auth');
});
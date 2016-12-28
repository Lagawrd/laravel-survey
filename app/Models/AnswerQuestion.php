<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnswerQuestion extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'answer_question';
    
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'answer_question_id'];

    public function answers() {
    	return $this->belongsTo('App\Models\Answer');
    }
}
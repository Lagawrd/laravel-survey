<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
     /**
     * The roles that belong to the user.
     */
    public function answers()
    {
        return $this->belongsToMany('App\Models\Answer');
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public function course() {
    	return $this->belongsTo('App\Course');
    }

    public function students() {
    	return $this->belongsToMany('App\Student', 'assignment_score')->withPivot('score');
    }
}

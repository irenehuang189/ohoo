<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public function course() {
		return $this->hasOne('App\Course', 'id', 'course_id');
	}
}

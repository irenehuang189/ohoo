<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Class extends Model
{
    public function student() {
		return $this->hasOne('App\Student', 'id', 'student_id');
	}

	public function teacher() {
		return $this->hasOne('App\Teacher', 'id', 'teacher_id');
	}
}

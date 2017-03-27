<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function kelas() {
		return $this->belongsTo('App\Kelas', 'class_id');
	}

	public function teacher() {
		return $this->belongsTo('App\Teacher');
	}

	public function exams() {
		return $this->hasMany('App\Exam');
	}

	public function assignments() {
		return $this->hasMany('App\Assignment');
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function kelas() {
		return $this->hasOne('App\Kelas', 'id', 'class_id');
	}

	public function teacher() {
		return $this->hasOne('App\Teacher', 'id', 'teacher_id');
	}

	public function exams() {
		return $this->hasMany('App\Exam');
	}
}

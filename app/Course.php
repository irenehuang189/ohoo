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

	public function students() {
		return $this->belongsToMany('App\Student', 'course_score')->withPivot('nilai', 'nilai_praktik', 'sikap');
	}

	public function studentsBayangan() {
		return $this->belongsToMany('App\Student', 'course_score_bayangan')->withPivot('nilai', 'nilai_praktik', 'sikap');
	}
}

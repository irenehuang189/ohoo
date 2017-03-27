<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	public function assignments() {
		return $this->belongsToMany('App\Assignment', 'assignment_score')->withPivot('score');
	}

	public function exams() {
		return $this->belongsToMany('App\Exam', 'exam_score')->withPivot('score');
	}

    public function kelas() {
        return $this->belongsToMany('App\Kelas', 'student_class', 'student_id', 'class_id');
    }

    public function users() {
    	return $this->hasMany('App\User');
    }
}

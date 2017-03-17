<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
	protected $table = 'classes';

	public function students() {
		return $this->belongsToMany('App\Student', 'student_class', 'class_id', 'student_id');
	}

	public function teacher() {
		return $this->hasOne('App\Teacher', 'id', 'teacher_id');
	}
}

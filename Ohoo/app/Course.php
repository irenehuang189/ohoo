<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function class() {
		return $this->hasOne('App\Class', 'id', 'class_id');
	}

	public function teacher() {
		return $this->hasOne('App\Teacher', 'id', 'teacher_id');
	}
}

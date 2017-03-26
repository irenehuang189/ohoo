<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function kelas() {
        return $this->belongsToMany('App\Kelas', 'student_class', 'student_id', 'class_id');
    }

    public function users() {
    	return $this->hasMany('App\User');
    }
}

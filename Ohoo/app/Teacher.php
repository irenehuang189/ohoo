<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function kelas() {
        return $this->hasMany('App\Kelas', 'id', 'class_id');
    }

    public function courses() {
        return $this->hasMany('App\Courses', 'id', 'course_id');
    }
}

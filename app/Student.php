<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    public function kelas() {
        return $this->belongsToMany('App\Kelas', 'student_class', 'student_id', 'class_id');
    }
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function kelas() {
        return $this->hasMany('App\Kelas');
    }

    public function courses() {
        return $this->hasMany('App\Course');
    }

    public function user() {
    	return $this->hasOne('App\User');
    }
}

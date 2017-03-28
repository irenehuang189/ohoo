<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'student_id', 'teacher_id', 'parent_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function student() {
        return $this->belongsTo('App\Student');
    }

    public function teacher() {
        return $this->belongsTo('App\Teacher');
    }

    public function parents() {
        return $this->belongsTo('App\Parents', 'parent_id');
    }
}

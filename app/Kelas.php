<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Kelas extends Model
{
    protected $table = 'classes';

    public function students() {
        return $this->belongsToMany('App\Student', 'student_class', 'class_id');
    }

    public function teacher() {
        return $this->belongsTo('App\Teacher');
    }

    public function courses() {
        return $this->hasMany('App\Course', 'class_id');
    }
}
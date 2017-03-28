<?php
/**
 * Created by PhpStorm.
 * User: William Sentosa
 * Date: 3/28/2017
 * Time: 8:32 PM
 */

namespace App\Http\Controllers\Teacher;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Student;
use App\Assignment;
use App\Course;
use App\Exam;
use App\Kelas;
use Illuminate\Support\Facades\Auth;


class IndividualController extends Controller
{
    private $teacher;

    public function __construct() {
        $this->teacher = Auth::user()->teacher;
    }

    public function showStudentList() {
        $teacher = $this->teacher;
        $class = $teacher->kelas()
                        ->where('is_current', '=', '1')
                        ->first();
        $students = $class->students()
                        ->orderBy('name')
                        ->get();
        return view('teacher/individu', compact('teacher', 'class', 'students'));
    }

    public function showStudent($id) {
        $student = Student::find($id);
        $teacher = $this->teacher;
        $class = $teacher->kelas()
                        ->where('is_current', '=', '1')
                        ->first();
        return view('teacher/individu/detail', compact('student', 'teacher', 'class'));
    }

}
<?php

namespace App\Http\Controllers\Student;

use App\Course;
use App\CourseScore;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Student;
use App\Kelas;

class StudentReportController extends Controller
{
    public function showReport() {
        $studentId = 1;
        $classId = 1;
        $student = Student::find($studentId);
        $class = Kelas::find($classId);
        $courses = Course::where('class_id', $classId)->get();
        return view('student.report');
    }
}

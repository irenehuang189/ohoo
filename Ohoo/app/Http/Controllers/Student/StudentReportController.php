<?php

namespace App\Http\Controllers\Student;
use App\Course;
use App\CourseScore;
use App\ExamScore;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Student;
use App\Kelas;
use Illuminate\Support\Facades\DB;

class StudentReportController extends Controller
{
    public function showReport() {
        $studentId = 1;
        $blank = 1;
        $student = Student::find($studentId);
        $classes = $student->kelas;
        $courses = $classes[0]->courses()
                            ->join('course_score', 'courses.id', '=', 'course_score.course_id')
                            ->where('student_id', '=', $studentId)
                            ->get();
        $averages = $classes[0]->courses()
                            ->join('course_score', 'courses.id', '=', 'course_score.course_id')
                            ->groupBy('course_id')
                            ->select('course_id', DB::raw('AVG(nilai) as avg'))
                            ->get();
        $classId = $classes[0]->id;
        return view('student.report', compact('student', 'classes', 'courses', 'classId', 'blank', 'averages'));
    }

    public function showReportByClassId($classId) {
        $studentId = 1;
        $blank = 0;
        $student = Student::find($studentId);
        $classes = $student->kelas;
        $courses = Kelas::find($classId)->courses()
                            ->join('course_score', 'courses.id', '=', 'course_score.course_id')
                            ->where('student_id', '=', $studentId)
                            ->get();
        $averages = Kelas::find($classId)->courses()
                            ->join('course_score', 'courses.id', '=', 'course_score.course_id')
                            ->groupBy('course_id')
                            ->select('course_id', DB::raw('AVG(nilai) as avg'))
                            ->get();
        return view('student.report', compact('student', 'classes', 'courses', 'classId', 'blank', 'averages'));
    }

    public function showDetailedReport() {
        $studentId = 1;
        $blank = 1;
        $courses = [];
        $student = Student::find($studentId);
        $classes = $student->kelas;
        return view('student.detail-report', compact('blank', 'courses', 'classes'));
    }

    public function showStatistic() {
        return view('student.statistic');
    }
    
    public function getCoursesByClassId($classId) {
        $studentId = 1;
        $class = Kelas::find($classId);
        $courses = $class->courses;
        return $courses;
    }
}
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentReportController extends Controller
{
    public function showReport() {
        $studentId = Auth::user()->student_id;
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
        $studentId = Auth::user()->student_id;
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
        $studentId = Auth::user()->student_id;
        $blank = 1;
        $courses = [];
        $student = Student::find($studentId);
        $classes = $student->kelas;
        $courseId = -1;
        $classId = -1;
        return view('student.detail-report', compact('blank', 'courses', 'classes','courseId', 'classId'));
    }

    public function showDetailedReportByCourseId($classId, $courseId) {
        $studentId = Auth::user()->student_id;
        $blank = 0;
        $courses = Kelas::find($classId)->courses;
        $student = Student::find($studentId);
        $classes = $student->kelas;
        $skbm = Course::find($courseId)->skbm;
        $exams = Course::find($courseId)->exams()
                        ->join('exam_score', 'exams.id', '=', 'exam_score.exam_id')
                        ->where('course_id', '=', $courseId)
                        ->where('student_id', '=', $studentId)
                        ->get();
        $exam_averages = Course::find($courseId)->exams()
                                ->join('exam_score', 'exams.id', '=', 'exam_score.exam_id')
                                ->groupBy('exam_id')
                                ->select('exam_id', DB::raw('AVG(score) as avg'))
                                ->get();
        $assignments = Course::find($courseId)->assignments()
                        ->join('assignment_score', 'assignments.id', '=', 'assignment_score.assignment_id')
                        ->where('course_id', '=', $courseId)
                        ->where('student_id', '=', $studentId)
                        ->get();
        $assignment_averages = Course::find($courseId)->assignments()
                                    ->join('assignment_score', 'assignments.id', '=', 'assignment_score.assignment_id')
                                    ->groupBy('assignment_id')
                                    ->select('assignment_id', DB::raw('AVG(score) as avg'))
                                    ->get();
        return view('student.detail-report', compact('blank', 'courses', 'classes', 'exams', 'assignments', 'exam_averages', 'assignment_averages', 'skbm', 'classId', 'courseId'));
    }

    public function showStatistic() {
        return view('student.statistic');
    }
    
    public function getCoursesByClassId($classId) {
        $studentId = Auth::user()->student_id;
        $class = Kelas::find($classId);
        $courses = $class->courses;
        return $courses;
    }
}
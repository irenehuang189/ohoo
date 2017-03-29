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
use App\CourseScore;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

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
        $courseScore = CourseScore::where('student_id', '=', $student->id)
                                    ->orderBy('course_id', 'desc')
                                    ->first();
        $course = Course::find($courseScore->course_id);
        $lastClass = Kelas::find($course->class_id);
        $average = $this->getAverageScore($student->id, $lastClass);
        $nilaiMerah = $this->getNilaiMerah($student->id, $class);
        $rank = $this->getRank($student->id, $class);
        $courses = Student::find($id)->kelas()
            ->join('courses', 'classes.id', '=', 'courses.class_id')
            ->join('course_score', 'courses.id', '=', 'course_score.course_id')
            ->where('course_score.student_id', '=', $id)
            ->groupBy('courses.name')
            ->select('courses.name')
            ->get();
        return view('teacher/individu/detail', compact('student', 'teacher', 'class', 'average', 'nilaiMerah', 'rank', 'courses'));
    }

    private function getAverageScore($studentId, $class) {
        $courses = $class->courses()
            ->join('course_score', 'courses.id', '=', 'course_score.course_id')
            ->where('student_id', '=', $studentId)
            ->groupBy('class_id')
            ->select(DB::raw('AVG(nilai) as avg'))
            ->first();
        return $courses->avg;
    }

    private function getNilaiMerah($studentId, $class) {
        $scores = $class->courses()
            ->join('course_score', 'courses.id', '=', 'course_score.course_id')
            ->where('student_id', '=', $studentId)
            ->get();
        $count = 0;
        foreach ($scores as $score) {
            if($score->nilai < $score->skbm) {
                $count++;
            }
            if($score->nilai_praktik < $score->skbm) {
                $count++;
            }
        }
        return $count;
    }

    private function getRank($studentId, $class) {
        $totalScores = $class->courses()
            ->join('course_score', 'courses.id', '=', 'course_score.course_id')
            ->groupBy('student_id')
            ->select('*', DB::raw('SUM(nilai) as total'))
            ->orderBy('total', 'desc')
            ->get();
        $rank = 0;
        foreach($totalScores as $totalScore) {
            $rank++;
            if($totalScore->student_id == $studentId) {
                break;
            }
        }
        return $rank;
    }

    public function getMeanStatistic($studentId) {
        $courses = Student::find($studentId)->kelas()
            ->join('courses', 'classes.id', '=', 'courses.class_id')
            ->join('course_score', 'courses.id', '=', 'course_score.course_id')
            ->where('course_score.student_id', '=', $studentId)
            ->groupBy('courses.class_id')
            ->select('classes.name', 'classes.semester', DB::raw('AVG(nilai) as avg'))
            ->get();
        return $courses;
    }

    public function getRankStatistic($studentId) {
        $classes = Student::find($studentId)->kelas;
        $data = array();
        foreach ($classes as $class) {
            $totalScores = $class->courses()
                ->join('course_score', 'courses.id', '=', 'course_score.course_id')
                ->groupBy('student_id')
                ->select('*', DB::raw('SUM(nilai) as total'))
                ->orderBy('total', 'desc')
                ->get();
            $rank = 0;
            foreach($totalScores as $totalScore) {
                $rank++;
                if($totalScore->student_id == $studentId) {
                    break;
                }
            }
            $temp = array("name" => $class->name, "semester" => $class->semester, "rank" => $rank);
            array_push($data, $temp);
        }
        return $data;
    }

    public function getCapabilityStatistic($studentId) {
        $courses = Student::find($studentId)->kelas()
            ->join('courses', 'classes.id', '=', 'courses.class_id')
            ->join('course_score', 'courses.id', '=', 'course_score.course_id')
            ->where('course_score.student_id', '=', $studentId)
            ->groupBy('courses.name')
            ->select('courses.name', DB::raw('AVG(nilai) as avg'))
            ->get();
        return $courses;
    }

    public function getHistoryCoursesStatistic($studentId, $data) {
        $courses = json_decode($data);
        $classes = $this->getPastClasses($studentId);
        $courseScore = Student::find($studentId)->kelas()
            ->join('courses', 'classes.id', '=', 'courses.class_id')
            ->join('course_score', 'courses.id', '=', 'course_score.course_id')
            ->where('course_score.student_id', '=', $studentId)
            ->select(DB::raw('courses.name as course_name'), DB::raw('classes.name as kelas'), 'semester', 'nilai')
            ->get();
        $course_scores = [];
        foreach ($courses as $course) {
            $scores = [];
            foreach ($courseScore as $n) {
                if ($n->course_name == $course) {
                    array_push($scores, $n->nilai);
                }
            }
            $temp = array('course_name' => $course, 'scores' => $scores);
            array_push($course_scores, $temp);
        }
        $response = new \stdClass();
        $response->classes = $classes;
        $response->course_scores = $course_scores;
        return json_encode($response);
    }

    private function getPastClasses($studentId) {
        $classes = Student::find($studentId)->kelas()
            ->join('courses', 'classes.id', '=', 'courses.class_id')
            ->join('course_score', 'courses.id', '=', 'course_score.course_id')
            ->where('course_score.student_id', '=', $studentId)
            ->groupBy('courses.class_id')
            ->select('classes.name', 'classes.semester')
            ->get();
        return $classes;
    }

    public function showReport($id){
        $studentId = $id;
        $teacher = $this->teacher;
        $class = $teacher->kelas()
            ->where('is_current', '=', '1')
            ->first();
        $blank = 1;
        $student = Student::find($id);
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
        return view('teacher/individu/report', compact('class', 'student', 'classes', 'courses', 'classId', 'blank', 'averages', 'teacher'));
    }

    public function showReportByClassId($id, $classId) {
        $studentId = $id;
        $teacher = $this->teacher;
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
        return view('teacher/individu/report', compact('teacher', 'student', 'classes', 'courses', 'classId', 'blank', 'averages'));
    }

    public function showReportBayangan($id) {
        $studentId = $id;
        $teacher = $this->teacher;
        $blank = 1;
        $student = Student::find($studentId);
        $classes = $student->kelas;
        $courses = $classes[0]->courses()
            ->join('course_score_bayangan', 'courses.id', '=', 'course_score_bayangan.course_id')
            ->where('student_id', '=', $studentId)
            ->get();
        $averages = $classes[0]->courses()
            ->join('course_score_bayangan', 'courses.id', '=', 'course_score_bayangan.course_id')
            ->groupBy('course_id')
            ->select('course_id', DB::raw('AVG(nilai) as avg'))
            ->get();
        $classId = $classes[0]->id;
        return view('teacher/individu/report-bayangan', compact('teacher', 'student', 'classes', 'courses', 'classId', 'blank', 'averages'));
    }

    public function showReportBayanganByClassId($id, $classId) {
        $studentId = $id;
        $teacher = $this->teacher;
        $blank = 0;
        $student = Student::find($studentId);
        $classes = $student->kelas;
        $courses = Kelas::find($classId)->courses()
            ->join('course_score_bayangan', 'courses.id', '=', 'course_score_bayangan.course_id')
            ->where('student_id', '=', $studentId)
            ->get();
        $averages = Kelas::find($classId)->courses()
            ->join('course_score_bayangan', 'courses.id', '=', 'course_score_bayangan.course_id')
            ->groupBy('course_id')
            ->select('course_id', DB::raw('AVG(nilai) as avg'))
            ->get();
        return view('teacher/individu/report-bayangan', compact('teacher', 'student', 'classes', 'courses', 'classId', 'blank', 'averages'));
    }

    public function showDetailedReport($id) {
        $teacher = $this->teacher;
        $studentId = $id;
        $blank = 1;
        $courses = [];
        $student = Student::find($studentId);
        $classes = $student->kelas;
        $courseId = -1;
        $classId = -1;
        return view('teacher/individu/detailed-report', compact('teacher', 'blank', 'student', 'courses', 'classes','courseId', 'classId'));
    }

    public function showDetailedReportByCourseId($id, $classId, $courseId) {
        $studentId = $id;
        $teacher = $this->teacher;
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
        return view('teacher/individu/detailed-report', compact('teacher', 'blank', 'student', 'courses', 'classes', 'exams', 'assignments', 'exam_averages', 'assignment_averages', 'skbm', 'classId', 'courseId'));
    }

    public function downloadReport($studentId, $classId){
        $student = Student::find($studentId);
        $class = Kelas::find($classId);
        $courses = $class->courses()
            ->join('course_score', 'courses.id', '=', 'course_score.course_id')
            ->where('student_id', '=', $studentId)
            ->get();
        $averages = $class->courses()
            ->join('course_score', 'courses.id', '=', 'course_score.course_id')
            ->groupBy('course_id')
            ->select('course_id', DB::raw('AVG(nilai) as avg'))
            ->get();
        $filename = "Test";
        $pdf = app('dompdf.wrapper');
        $view = "";
        $pdf->loadView($view, compact('student', 'class', 'courses', 'averages'));
        return $pdf->download($filename . '.pdf');
    }

    public function downloadReportBayangan($studentId, $classId){
        $student = Student::find($studentId);
        $class = Kelas::find($classId);
        $courses = $class->courses()
            ->join('course_score_bayangan', 'courses.id', '=', 'course_score_bayangan.course_id')
            ->where('student_id', '=', $studentId)
            ->get();
        $averages = $class->courses()
            ->join('course_score_bayangan', 'courses.id', '=', 'course_score_bayangan.course_id')
            ->groupBy('course_id')
            ->select('course_id', DB::raw('AVG(nilai) as avg'))
            ->get();
        $filename = "Test";
        $pdf = app('dompdf.wrapper');
        $view = "";
        $pdf->loadView($view, compact('student', 'class', 'courses', 'averages'));
        return $pdf->download($filename . '.pdf');
    }

}
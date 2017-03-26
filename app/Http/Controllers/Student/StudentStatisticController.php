<?php
/**
 * Created by PhpStorm.
 * User: William Sentosa
 * Date: 3/25/2017
 * Time: 12:16 PM
 */

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
use Illuminate\Support\Facades\Log;

class StudentStatisticController extends Controller
{
    public function showStatistic() {
        $studentId = Auth::user()->student_id;
        $student = Student::find($studentId);
        $courseScore = CourseScore::where('student_id', '=', $studentId)
                                    ->orderBy('course_id', 'desc')
                                    ->first();
        $course = Course::find($courseScore->course_id);
        $class = Kelas::find($course->class_id);
        $averageScore = $this->getAverageScore($studentId, $class);
        $nilaiMerah = $this->getNilaiMerah($studentId, $class);
        $rank = $this->getRank($studentId, $class);
        
        $courses = Student::find($studentId)->kelas()
            ->join('courses', 'classes.id', '=', 'courses.class_id')
            ->join('course_score', 'courses.id', '=', 'course_score.course_id')
            ->where('course_score.student_id', '=', $studentId)
            ->groupBy('courses.name')
            ->select('courses.name')
            ->get();
        return view('student.statistic', compact('student','averageScore', 'nilaiMerah', 'rank', 'courses'));
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

    public function getMeanStatistic() {
        $studentId = Auth::user()->student_id;
        $courses = Student::find($studentId)->kelas()
            ->join('courses', 'classes.id', '=', 'courses.class_id')
            ->join('course_score', 'courses.id', '=', 'course_score.course_id')
            ->where('course_score.student_id', '=', $studentId)
            ->groupBy('courses.class_id')
            ->select('classes.name', 'classes.semester', DB::raw('AVG(nilai) as avg'))
            ->get();
        return $courses;
    }

    public function getRankStatistic() {
        $studentId = Auth::user()->student_id;
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

    public function getCapabilityStatistic() {
        $studentId = Auth::user()->student_id;
        $courses = Student::find($studentId)->kelas()
                ->join('courses', 'classes.id', '=', 'courses.class_id')
                ->join('course_score', 'courses.id', '=', 'course_score.course_id')
                ->where('course_score.student_id', '=', $studentId)
                ->groupBy('courses.name')
                ->select('courses.name', DB::raw('AVG(nilai) as avg'))
                ->get();
        return $courses;
    }
    
    public function getHistoryCoursesStatistic($data) {
        $studentId = Auth::user()->student_id;
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
}
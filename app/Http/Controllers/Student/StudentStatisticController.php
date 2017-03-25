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
use Illuminate\Support\Facades\DB;

class StudentStatisticController extends Controller
{
    public function showStatistic() {
        $studentId = 1;
        $student = Student::find($studentId);
        $courseScore = CourseScore::where('student_id', '=', $studentId)
                                    ->orderBy('course_id', 'desc')
                                    ->first();
        $course = Course::find($courseScore->course_id);
        $class = Kelas::find($course->class_id);
        $averageScore = $this->getAverageScore($studentId, $class);
        $nilaiMerah = $this->getNilaiMerah($studentId, $class);
        $rank = $this->getRank($studentId, $class);
        return view('student.statistic', compact('student','averageScore', 'nilaiMerah', 'rank'));
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
}
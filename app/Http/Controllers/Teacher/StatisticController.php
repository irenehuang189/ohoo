<?php
/**
 * Created by PhpStorm.
 * User: William Sentosa
 * Date: 3/27/2017
 * Time: 5:14 PM
 */

namespace App\Http\Controllers\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Kelas;

class StatisticController extends Controller
{
    private $teacher;

    public function __construct() {
        $this->teacher = Auth::user()->teacher;
    }

    public function showStatistic() {
        $teacher = $this->teacher;
        $class_names = $teacher->courses()
            ->join('classes', 'classes.id', '=', 'courses.class_id')
            ->where('is_current', '=', '1')
            ->distinct()
            ->get(['classes.id', 'classes.name', 'classes.semester']);
        $currentClassId = $class_names[0]->id;
        $current_class_name = $class_names[0];
        $courses = Kelas::find($current_class_name->id)->courses()
                        ->where('teacher_id', '=', $teacher->id)
                        ->get();
        $currentCourseId = $courses[0]->id;
        return view('teacher/statistic', compact('teacher', 'courses', 'class_names', 'courses', 'currentCourseId', 'currentClassId'));
    }

    public function getHistoryStatistic($classId, $courseName) {
        $teacher = $this->teacher;
        $className = Kelas::find($classId)->name;
        $semester = Kelas::find($classId)->semester;
        $scores = Kelas::where('classes.name', '=', $className)
                        ->where('semester', '=', $semester)
                        ->join('courses', 'classes.id', '=' ,'courses.class_id')
                        ->where('courses.name', '=', $courseName)
                        ->join('course_score', 'courses.id', '=', 'course_score.course_id')
                        ->groupBy('classes.year')
                        ->orderBy('classes.year')
                        ->select('courses.name', 'classes.year', DB::raw('AVG(nilai) as avg'))
                        ->get();
        return $scores;
    }

    public function getCoursesByClassId($classId) {
        $courses = Kelas::find($classId)->courses()
                            ->where('teacher_id', '=', $this->teacher->id)
                            ->get();
        return $courses;
    }

    public function getPeringkatStatistic() {
        
    }

}
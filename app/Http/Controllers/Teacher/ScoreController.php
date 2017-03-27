<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Kelas;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
	private $teacher;

	public function __construct() {
		$this->teacher = Auth::user()->teacher;
	}

    public function showScores() {
    	$teacher = $this->teacher;
    	$classes = $this->getClassesByTeacher();
    	$courses = $this->getCoursesByTeacher();
        $exams = $this->getExamsByTeacher();

    	return view('teacher/score', compact('classes', 'courses', 'teacher', 'exams'));
    }

    private function getClassesByTeacher() {
    	$teacher = $this->teacher;
    	$classes = $teacher->kelas;
    	$courses = $this->getCoursesByTeacher();

    	foreach ($courses as $course) {
            if (!$classes->contains($course->kelas)) {
                $classes = $classes->push($course->kelas);
            }
    	}

    	return $classes->sortByDesc('year')->sortByDesc('semester')->sortBy('name');
    }

    private function getCoursesByTeacher() {
    	$teacher = $this->teacher;
        $courses = $teacher->courses;
    	
    	return $courses->sortByDesc(function ($course) {
    		return $course->kelas->year;
    	})->sortByDesc(function ($course) {
    		return $course->kelas->semester;
    	})->sortBy('name');
    }

    private function getExamsByTeacher() {
    	$courses = $this->getCoursesByTeacher();

        $exams = collect();
        foreach ($courses as $course) {
            $exams = $exams->merge($course->exams);
        }

        return $exams->sortByDesc(function ($exam) {
            return $exam->course->kelas->year;
        })->sortByDesc(function ($exam) {
            return $exam->course->kelas->semester;
        })->sortBy(function ($exam) {
            return $exam->course->name;
        })->sortByDesc('tanggal');
    }
}

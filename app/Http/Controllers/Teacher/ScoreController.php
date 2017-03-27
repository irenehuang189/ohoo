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
        $assignments = $this->getAssignmentsByTeacher();

    	return view('teacher/score', compact('assignments', 'classes', 'courses', 'teacher', 'exams'));
    }

    private function getClassesByTeacher() {
    	$classes = $this->teacher->kelas;
    	$courses = $this->getCoursesByTeacher();

    	foreach ($courses as $course) {
            if (!$classes->contains($course->kelas)) {
                $classes = $classes->push($course->kelas);
            }
    	}

    	return $classes->sortByDesc('year')->sortByDesc('semester')->sortBy('name');
    }

    private function getCoursesByTeacher() {
        $courses = $this->teacher->courses;
    	
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
        })->sortByDesc('tanggal')->sortBy(function ($exam) {
            return $exam->course->name;
        });
    }

    private function getAssignmentsByTeacher() {
        $courses = $this->getCoursesByTeacher();

        $assignments = collect();
        foreach ($courses as $course) {
            $assignments = $assignments->merge($course->assignments);
        }

        return $assignments->sortByDesc(function ($assignment) {
            return $assignment->course->kelas->year;
        })->sortByDesc(function ($assignment) {
            return $assignment->course->kelas->semester;
        })->sortByDesc('tanggal')->sortBy(function ($assignment) {
            return $assignment->course->name;
        });
    }
}

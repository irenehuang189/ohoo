<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Course;
use App\Kelas;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
	private $teacher;

	public function __construct() {
		$this->teacher = Auth::user()->teacher;
	}

    public function showScores(Request $request) {
        $classId = $request->query('class');
        $courseId = $request->query('course');

    	$teacher = $this->teacher;
    	$classes = $this->getClassesByTeacher();
        if ($classId) {
            $courses = $this->getCoursesByTeacherClassId($classId);
        } else {
            $courses = collect();
        }
        $exams = $this->getExamsByTeacherWithFilter($classId, $courseId);
        $assignments = $this->getAssignmentsByTeacherWithFilter($classId, $courseId);

    	return view('teacher/score', compact('assignments', 'classId', 'classes', 'courseId', 'courses', 'teacher', 'exams'));
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

    private function getExamsByTeacherWithFilter($classId, $courseId) {
        if (!$classId && !$courseId) {
            return $this->getExamsByTeacher();
        }

        if ($classId && $courseId) {
            $course = Course::find($courseId);
            if ($course->class_id == $classId && $course->teacher_id == $this->teacher->id) {
                $exams = $course->exams;
            } else {
                $exams = collect();
            }
        } else if ($classId && !$courseId) {
            $class = Kelas::find($classId);
            $courses = $class->courses;

            $exams = collect();
            foreach ($courses as $course) {
                if ($course->teacher_id == $this->teacher->id) {
                    $exams = $exams->merge($course->exams);
                }
            }
        } else {
            $course = Course::find($courseId);
            if ($course->teacher_id == $this->teacher->id) {
                $exams = $course->exams;
            } else {
                $exams = collect();
            }
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

    private function getAssignmentsByTeacherWithFilter($classId, $courseId) {
        if (!$classId && !$courseId) {
            return $this->getAssignmentsByTeacher();
        }

        if ($classId && $courseId) {
            $course = Course::find($courseId);
            if ($course->class_id == $classId && $course->teacher_id == $this->teacher->id) {
                $assignments = $course->assignments;
            } else {
                $assignments = collect();
            }
        } else if ($classId) {
            $class = Kelas::find($classId);
            $courses = $class->courses;

            $assignments = collect();
            foreach ($courses as $course) {
                if ($course->teacher_id == $this->teacher->id) {
                    $assignments = $assignments->merge($course->assignments);
                }
            }
        } else {
            $course = Course::find($courseId);
            if ($course->teacher_id == $this->teacher->id) {
                $assignments = $course->assignments;
            } else {
                $assignments = collect();
            }
        }

        return $assignments->sortByDesc(function ($assignment) {
            return $assignment->course->kelas->year;
        })->sortByDesc(function ($assignment) {
            return $assignment->course->kelas->semester;
        })->sortByDesc('tanggal')->sortBy(function ($assignment) {
            return $assignment->course->name;
        });
    }

    private function getClassesByTeacher() {
    	$courses = $this->getCoursesByTeacher();

        $classes = collect();
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

    public function getCoursesByTeacherClassId($classId) {
        $class = Kelas::find($classId);
        $course_list = $class->courses;

        $courses = collect();
        foreach ($course_list as $course) {
            if ($course->teacher_id == $this->teacher->id) {
                $courses = $courses->push($course);
            }
        }

        return $courses;
    }
}

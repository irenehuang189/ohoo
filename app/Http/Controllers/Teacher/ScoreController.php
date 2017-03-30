<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Assignment;
use App\AssignmentScore;
use App\Course;
use App\CourseScore;
use App\CourseScoreBayangan;
use App\Exam;
use App\ExamScore;
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

    public function showFinalScores(Request $request) {
        $classId = $request->query('class');
        $courseId = $request->query('course');

        $teacher = $this->teacher;
        $classes = $this->getClassesByTeacher();
        if ($classId) {
            $courseChoices = $this->getCoursesByTeacherClassId($classId);
            if ($courseId) {
                $courses = Course::where('id', $courseId)->get();
            } else {
                $courses = $this->getCoursesByTeacherClassId($classId);
            }
        } else {
            $courseChoices = collect();
            $courses = $this->getCoursesByTeacher();
        }
        $exams = $this->getExamsByTeacherWithFilter($classId, $courseId);
        $assignments = $this->getAssignmentsByTeacherWithFilter($classId, $courseId);

        return view('teacher/semester-score', compact('classId', 'classes', 'courseChoices', 'courseId', 'courses', 'teacher'));
    }

    public function showExamDetail($id) {
        $exam = Exam::find($id);
        return $this->showDetail($exam, 'exam');
    }

    public function showAssignmentDetail($id) {
        $assignment = Assignment::find($id);
        return $this->showDetail($assignment, 'assignment');
    }

    private function showDetail($task, $taskType) {
        $teacher = $this->teacher;
        $students = $task->students;
        return view('teacher/score/detail', compact('students', 'task', 'taskType', 'teacher'));
    }

    public function showSemesterDetail($courseId) {
        $teacher = $this->teacher;
        $course = Course::find($courseId);
        $students = $course->students;
        $scoreType = 'semester';
        return view('teacher/semester-score/detail', compact('course', 'scoreType', 'students', 'teacher'));
    }

    public function showBayanganDetail($courseId) {
        $teacher = $this->teacher;
        $course = Course::find($courseId);
        $students = $course->studentsBayangan;
        $scoreType = 'bayangan';
        return view('teacher/semester-score/detail', compact('course', 'scoreType', 'students', 'teacher'));
    }

    public function showAddExamForm() {
        return $this->showAddTaskForm('exam');
    }

    public function showAddAssignmentForm() {
        return $this->showAddTaskForm('assignment');
    }

    private function showAddTaskForm($taskType) {
        $teacher = $this->teacher;
        $classes = $this->getCurrentClassesByTeacher();

        return view('teacher/score/add', compact('classes', 'taskType', 'teacher'));
    }

    public function showAddSemesterForm() {
        $teacher = $this->teacher;
        $classes = $this->getCurrentClassesByTeacher();
        $scoreType = "semester";
        return view('teacher/semester-score/add', compact('classes', 'scoreType', 'teacher'));
    }

    public function showAddBayanganForm() {
        $teacher = $this->teacher;
        $classes = $this->getCurrentClassesByTeacher();
        $scoreType = "bayangan";
        return view('teacher/semester-score/add', compact('classes', 'scoreType', 'teacher'));
    }

    public function addSemester(Request $request) {
        $requestBody = json_decode($request->getContent());
        $courseId = $requestBody->courseId;
        $studentIds = $requestBody->studentIds;
        $studentScores = $requestBody->studentScores;

        foreach ($studentIds as $index => $studentId) {
            $studentScore = $studentScores[$index];

            $courseScore = new CourseScore;
            $courseScore->course_id = $courseId;
            $courseScore->student_id = $studentId;
            $courseScore->nilai = $studentScore;
            $courseScore->nilai_praktik = $studentScore;
            $courseScore->sikap = 'A';
            $courseScore->save();
        }

        return url('/teacher/score/final');
    }

    public function addBayangan(Request $request) {
        $requestBody = json_decode($request->getContent());
        $courseId = $requestBody->courseId;
        $studentIds = $requestBody->studentIds;
        $studentScores = $requestBody->studentScores;

        foreach ($studentIds as $index => $studentId) {
            $studentScore = $studentScores[$index];

            $courseScore = new CourseScoreBayangan;
            $courseScore->course_id = $courseId;
            $courseScore->student_id = $studentId;
            $courseScore->nilai = $studentScore;
            $courseScore->nilai_praktik = $studentScore;
            $courseScore->sikap = 'A';
            $courseScore->save();
        }

        return url('/teacher/score/final');
    }

    public function showEditExamForm($id) {
        return $this->showEditTaskForm(Exam::find($id), 'exam');
    }

    public function showEditAssignmentForm($id) {
        return $this->showEditTaskForm(Assignment::find($id), 'assignment');
    }

    private function showEditTaskForm($task, $taskType) {
        $teacher = $this->teacher;

        return view('teacher/score/add', compact('task', 'taskType', 'teacher'));
    }

    public function addExam(Request $request) {
        $requestBody = json_decode($request->getContent());
        $classId = $requestBody->classId;
        $courseId = $requestBody->courseId;

        if ($classId && $courseId) {
            $exam = new Exam;
            $exam->course_id = $courseId;
            $exam->name = $requestBody->taskName;
            $exam->materi = $requestBody->taskMatter;
            $exam->tanggal = $requestBody->taskDate;
            $exam->save();

            $studentIds = $requestBody->studentIds;
            $studentScores = $requestBody->studentScores;
            foreach($studentIds as $index => $studentId) {
                $studentScore = $studentScores[$index];
                if (!$studentScore) {
                    $studentScore = 0;
                }

                $examScore = new ExamScore;
                $examScore->exam_id = $exam->id;
                $examScore->student_id = $studentId;
                $examScore->score = $studentScore;
                $examScore->save();
            }
        }

        if ($requestBody->taskStatus == 'finish') {
            return url('teacher/score');
        } else {
            return url('teacher/score/exam/edit/' . $exam->id);
        }
    }

    public function addAssignment(Request $request) {
        $requestBody = json_decode($request->getContent());
        $classId = $requestBody->classId;
        $courseId = $requestBody->courseId;

        if ($classId && $courseId) {
            $assignment = new Assignment;
            $assignment->course_id = $courseId;
            $assignment->name = $requestBody->taskName;
            $assignment->materi = $requestBody->taskMatter;
            $assignment->tanggal = $requestBody->taskDate;
            $assignment->save();

            $studentIds = $requestBody->studentIds;
            $studentScores = $requestBody->studentScores;
            foreach($studentIds as $index => $studentId) {
                $studentScore = $studentScores[$index];
                if (!$studentScore) {
                    $studentScore = 0;
                }

                $assignmentScore = new ExamScore;
                $assignmentScore->assignment_id = $assignment->id;
                $assignmentScore->student_id = $studentId;
                $assignmentScore->score = $studentScore;
                $assignmentScore->save();
            }
        }

        if ($requestBody->taskStatus == 'finish') {
            return url('teacher/score');
        } else {
            return url('teacher/score/assignment/edit/' . $assignment->id);
        }
    }

    public function editExam(Request $request) {
        $requestBody = json_decode($request->getContent());
        $courseId = $requestBody->courseId;
        $examId = $requestBody->taskId;

        $exam = Exam::find($examId);
        $exam->course_id = $courseId;
        $exam->name = $requestBody->taskName;
        $exam->materi = $requestBody->taskMatter;
        $exam->tanggal = $requestBody->taskDate;
        $exam->save();

        $taskScoreIds = $requestBody->taskScoreIds;
        $studentScores = $requestBody->studentScores;
        foreach($taskScoreIds as $index => $taskScoreId) {
            $studentScore = $studentScores[$index];
            if (!$studentScore) {
                $studentScore = 0;
            }

            $examScore = ExamScore::find($taskScoreId);
            $examScore->score = $studentScore;
            $examScore->save();
        }

        if ($requestBody->taskStatus == 'finish') {
            return url('teacher/score');
        } else {
            return url('teacher/score/exam/edit/' . $examId);
        }
    }

    public function editAssignment(Request $request) {
        $requestBody = json_decode($request->getContent());
        $courseId = $requestBody->courseId;
        $assignmentId = $requestBody->taskId;

        $assignment = Assignment::find($assignmentId);
        $assignment->course_id = $courseId;
        $assignment->name = $requestBody->taskName;
        $assignment->materi = $requestBody->taskMatter;
        $assignment->tanggal = $requestBody->taskDate;
        $assignment->save();

        $taskScoreIds = $requestBody->taskScoreIds;
        $studentScores = $requestBody->studentScores;
        foreach($taskScoreIds as $index => $taskScoreId) {
            $studentScore = $studentScores[$index];
            if (!$studentScore) {
                $studentScore = 0;
            }

            $assignmentScore = AssignmentScore::find($taskScoreId);
            $assignmentScore->score = $studentScore;
            $assignmentScore->save();
        }

        if ($requestBody->taskStatus == 'finish') {
            return url('teacher/score');
        } else {
            return url('teacher/score/assignment/edit/' . $assignmentId);
        }
    }

    public function deleteExam($id) {
        $exam = Exam::find($id);
        $exam->delete();
        return 'teacher/score';
    }

    public function deleteAssignment($id) {
        $assignment = Assignment::find($id);
        $assignment->delete();
        return 'teacher/score';
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

    private function getCurrentClassesByTeacher() {
        $class_list = $this->getClassesByTeacher();
        $classes = collect();
        foreach ($class_list as $class) {
            if ($class->is_current) {
                $classes = $classes->push($class);
            }
        }
        return $classes;
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

    public function getStudentsByClassId($classId) {
        $class = Kelas::find($classId);
        $students = $class->students;
        return $students;
    }

    public function getSemesterScores(Request $request) {
        $requestBody = json_decode($request->getContent());
        $endtermPercent = $requestBody->endtermPercent;
        $midtermPercent = $requestBody->midtermPercent;
        $dailyPercent = $requestBody->dailyPercent;
        $assignPercent = $requestBody->assignPercent;

        $class = Kelas::find($requestBody->classId);
        $courseId = $requestBody->courseId;
        $student_list = $class->students;

        $students = [];
        foreach ($student_list as $student) {
            $endtermExams = $student->exams;
            $endterms = collect();
            foreach ($endtermExams as $endtermExam) {
                if ($endtermExam->course_id == $courseId && str_contains($endtermExam->name, 'Ujian Akhir Semester')) {
                    $endterms = $endterms->push($endtermExam);
                }
            }
            $endtermScore = 0;
            if ($endterms->count() > 0) {
                $endtermScore = $endterms->sum('pivot.score');
                $endtermScore = ($endtermPercent/100) * ($endtermScore/$endterms->count());
            }

            $midtermExams = $student->exams;
            $midterms = collect();
            foreach ($midtermExams as $midtermExam) {
                if ($midtermExam->course_id == $courseId && str_contains($midtermExam->name, 'Ujian Tengah Semester')) {
                    $midterms = $midterms->push($midtermExam);
                }
            }
            $midtermScore = 0;
            if ($midterms->count() > 0) {
                $midtermScore = $midterms->sum('pivot.score');
                $midtermScore = ($midtermPercent/100) * ($midtermScore/$midterms->count());
            }

            $dailyExams = $student->exams;
            $dailys = collect();
            foreach ($dailyExams as $dailyExam) {
                if ($dailyExam->course_id == $courseId && str_contains($dailyExam->name, 'Ulangan Harian')) {
                    $dailys = $dailys->push($dailyExam);
                }
            }
            $dailyScore = 0;
            if ($dailys->count() > 0) {
                $dailyScore = $dailys->sum('pivot.score');
                $dailyScore = ($dailyPercent/100) * ($dailyScore/$dailys->count());
            }

            $assignments = $student->assignments;
            $assignScore = 0;
            $assigns = collect();
            foreach ($assignments as $assignment) {
                if ($assignment->course_id == $courseId) {
                    $assigns = $assigns->push($assignment);
                }
            }
            if ($assigns->count() > 0) {
                $assignScore = $assigns->sum('pivot.score');
                $assignScore = ($assignPercent/100) * ($assignScore/$assigns->count());
            }

            $finalScore = $endtermScore + $midtermScore + $dailyScore + $assignScore;
            $students[] = ['studentId' => $student->id, 'finalConcept' => $finalScore, 'studentReg' => $student->registration_number, 'studentName' => $student->name];
        }

        return json_encode($students);
    }
}

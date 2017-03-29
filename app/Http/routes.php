<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('', function() {
	if (isset(Auth::user()->student)) {
		return redirect('student/statistic');
	} else if (isset(Auth::user()->teacher)) {
		return redirect('teacher/statistic');
	}  else if (isset(Auth::user()->parents)) {
		return redirect('parent/statistic');
	}
  return redirect('logout');
});

/* Login */
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

/* Ubah Password */
Route::get('password/edit', function(){
	return view('edit-password');
});

/* Student report */
Route::get('/parent/report', 'Parent\StudentReportController@showReport');
Route::get('/parent/report/{id}', 'Parent\StudentReportController@showReportByClassId');
Route::get('/parent/detailed-report', 'Parent\StudentReportController@showDetailedReport');
Route::get('/parent/getCoursesByClassId/{id}', 'Parent\StudentReportController@getCoursesByClassId');
Route::get('/parent/detailed-report/{classId}/{courseId}', 'Parent\StudentReportController@showDetailedReportByCourseId');

/* Student statistic */
Route::get('/parent/statistic', 'Parent\StudentStatisticController@showStatistic');
Route::get('/parent/getMeanStatistic', 'Parent\StudentStatisticController@getMeanStatistic');
Route::get('/parent/getRankStatistic', 'Parent\StudentStatisticController@getRankStatistic');
Route::get('/parent/getCapabilityStatistic', 'Parent\StudentStatisticController@getCapabilityStatistic');
Route::get('/parent/getHistoryCoursesStatistic/{request}', 'Parent\StudentStatisticController@getHistoryCoursesStatistic');
Route::get('/parent/report-bayangan', 'Parent\StudentReportController@showReportBayangan');
Route::get('/parent/report-bayangan/{id}', 'Parent\StudentReportController@showReportBayanganByClassId');

Route::get('/student/getCoursesByClassId/{id}', 'Student\StudentReportController@getCoursesByClassId');

Route::group(['middleware' => 'student'], function() {
	/* Student report */
	Route::get('/student/report', 'Student\StudentReportController@showReport');
	Route::get('/student/report/{id}', 'Student\StudentReportController@showReportByClassId');
	Route::get('/student/detailed-report', 'Student\StudentReportController@showDetailedReport');
	Route::get('/student/detailed-report/{classId}/{courseId}', 'Student\StudentReportController@showDetailedReportByCourseId');
	Route::get('/student/report-bayangan', 'Student\StudentReportController@showReportBayangan');
	Route::get('/student/report-bayangan/{id}', 'Student\StudentReportController@showReportBayanganByClassId');

	/* Student statistic */
	Route::get('/student/statistic', 'Student\StudentStatisticController@showStatistic');
	Route::get('/student/getMeanStatistic', 'Student\StudentStatisticController@getMeanStatistic');
	Route::get('/student/getRankStatistic', 'Student\StudentStatisticController@getRankStatistic');
	Route::get('/student/getCapabilityStatistic', 'Student\StudentStatisticController@getCapabilityStatistic');
	Route::get('/student/getHistoryCoursesStatistic/{request}', 'Student\StudentStatisticController@getHistoryCoursesStatistic');
});

Route::post('/teacher/score/exam/add', 'Teacher\ScoreController@addExam');

Route::group(['middleware' => 'teacher'], function() {
	/* Score */
	Route::get('/teacher/score', 'Teacher\ScoreController@showScores');
	Route::get('/teacher/score/exam/add', 'Teacher\ScoreController@showAddExamForm');
	Route::post('/teacher/score/exam/add', 'Teacher\ScoreController@addExam');
	Route::get('/teacher/score/assignment/add', 'Teacher\ScoreController@showAddAssignmentForm');
	Route::post('/teacher/score/assignment/add', 'Teacher\ScoreController@addAssignment');
	Route::get('/teacher/score/exam/edit/{id}', 'Teacher\ScoreController@showEditExamForm');
	Route::post('/teacher/score/exam/edit', 'Teacher\ScoreController@editExam');
	Route::get('/teacher/score/assignment/edit/{id}', 'Teacher\ScoreController@showEditAssignmentForm');
	Route::post('/teacher/score/assignment/edit', 'Teacher\ScoreController@editAssignment');
	Route::get('/teacher/score/exam/delete/{id}', 'Teacher\ScoreController@deleteExam');
	Route::get('/teacher/score/assignment/delete/{id}', 'Teacher\ScoreController@deleteAssignment');
	Route::get('/teacher/score/exam/detail/{id}', 'Teacher\ScoreController@showExamDetail');
	Route::get('/teacher/score/assignment/detail/{id}', 'Teacher\ScoreController@showAssignmentDetail');
	Route::get('/teacher/score/semester', 'Teacher\ScoreController@showSemesterScores');
	Route::get('/teacher/score/semester/add', function() {
	  return view('teacher/semester-score/add');
	});
	Route::get('/teacher/score/semester/detail', function() {
	  return view('teacher/semester-score/detail');
	});

	/* Individu */
	Route::get('/teacher/individu', 'Teacher\IndividualController@showStudentList');
	Route::get('/teacher/individu/detail/{id}', 'Teacher\IndividualController@showStudent');
	Route::get('/teacher/individu/report/{id}', 'Teacher\IndividualController@showReport');
	Route::get('/teacher/individu/report-bayangan/{id}', 'Teacher\IndividualController@showReportBayangan');
	Route::get('/teacher/individu/detailed-report/{id}', 'Teacher\IndividualController@showDetailedReport');
	/* Individu chart */
	Route::get('/teacher/individu/getMeanStatistic/{id}', 'Teacher\IndividualController@getMeanStatistic');
	Route::get('/teacher/individu/getRankStatistic/{id}', 'Teacher\IndividualController@getRankStatistic');
	Route::get('/teacher/individu/getCapabilityStatistic/{id}', 'Teacher\IndividualController@getCapabilityStatistic');
	Route::get('/teacher/individu/getHistoryCoursesStatistic/{id}/{request}', 'Teacher\IndividualController@getHistoryCoursesStatistic');


	/* Statistik */
	Route::get('/teacher/statistic', 'Teacher\StatisticController@showStatistic');
	Route::get('/teacher/getHistoryStatistic/{classId}/{courseName}', 'Teacher\StatisticController@getHistoryStatistic');
	Route::get('/teacher/getCoursesByClassId/{classId}', 'Teacher\StatisticController@getCoursesByClassId');

	/* Others */
	Route::get('teacher/courses/{classId}', 'Teacher\ScoreController@getCoursesByTeacherClassId');
	Route::get('teacher/students/{classId}', 'Teacher\ScoreController@getStudentsByClassId');
});


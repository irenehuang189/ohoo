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

Route::group(['middleware' => 'student'], function() {
	/* Student report */
	Route::get('/student/report', 'Student\StudentReportController@showReport');
	Route::get('/student/report/{id}', 'Student\StudentReportController@showReportByClassId');
	Route::get('/student/detailed-report', 'Student\StudentReportController@showDetailedReport');
	Route::get('/student/getCoursesByClassId/{id}', 'Student\StudentReportController@getCoursesByClassId');
	Route::get('/student/detailed-report/{classId}/{courseId}', 'Student\StudentReportController@showDetailedReportByCourseId');

	/* Student statistic */
	Route::get('/student/statistic', 'Student\StudentStatisticController@showStatistic');
	Route::get('/student/getMeanStatistic', 'Student\StudentStatisticController@getMeanStatistic');
	Route::get('/student/getRankStatistic', 'Student\StudentStatisticController@getRankStatistic');
	Route::get('/student/getCapabilityStatistic', 'Student\StudentStatisticController@getCapabilityStatistic');
	Route::get('/student/getHistoryCoursesStatistic/{request}', 'Student\StudentStatisticController@getHistoryCoursesStatistic');
});

Route::group(['middleware' => 'teacher'], function() {
	/* Score */
	Route::get('/teacher/score', 'Teacher\ScoreController@showScores');
	Route::get('/teacher/score/exam/add', 'Teacher\ScoreController@showAddExamForm');
	Route::post('/teacher/score/exam/add', 'Teacher\ScoreController@addExam');
	Route::get('/teacher/score/assignment/add', 'Teacher\ScoreController@showAddAssignmentForm');
	Route::post('/teacher/score/assignment/add', 'Teacher\ScoreController@addAssignment');
	Route::get('/teacher/score/exam/detail/{id}', 'Teacher\ScoreController@showExamDetail');
	Route::get('/teacher/score/assignment/detail/{id}', 'Teacher\ScoreController@showAssignmentDetail');
	Route::get('/teacher/score/semester', function(){
		return view('teacher/semester-score');
	});
	Route::get('/teacher/score/semester/add', function() {
	  return view('teacher/semester-score/add');
	});
	Route::get('/teacher/score/semester/detail', function() {
	  return view('teacher/semester-score/detail');
	});

	/* Individu */
	Route::get('/teacher/individu', function() {
	  return view('teacher/individu');
	});
	Route::get('/teacher/individu/detail', function() {
	  return view('teacher/individu/detail');
	});
	Route::get('/teacher/statistic', function() {
	  return view('teacher/statistic');
	});

	/* Others */
	Route::get('teacher/courses/{classId}', 'Teacher\ScoreController@getCoursesByTeacherClassId');
	Route::get('teacher/students/{classId}', 'Teacher\ScoreController@getStudentsByClassId');
});

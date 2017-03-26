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

Route::get('/', function() {
    return view('teacher/statistic');
});

/* Login */
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

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

/* Teacher */
// Class
Route::get('/teacher/class', function() {
  return view('teacher/class');
});
Route::get('/teacher/class/add', function() {
  return view('teacher/class/add');
});
Route::get('/teacher/class/detail', function() {
  return view('teacher/class/detail');
});

Route::get('/teacher/course', function() {
  return view('teacher/course');
});

// Individu
Route::get('/teacher/individu', function() {
  return view('teacher/individu');
});

Route::get('/teacher/statistic', function() {
  return view('teacher/statistic');
});

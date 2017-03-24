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

Route::get('/', function () {
    return view('login');
});

/* Login */
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

Route::get('/student/report', 'Student\StudentReportController@showReport');
Route::get('/student/report/{id}', 'Student\StudentReportController@showReportByClassId');
Route::get('/student/detailed-report', 'Student\StudentReportController@showDetailedReport');
Route::get('/student/statistic', 'Student\StudentReportController@showStatistic');
Route::get('/student/getCoursesByClassId/{id}', 'Student\StudentReportController@getCoursesByClassId');
Route::get('/student/detailed-report/{classId}/{courseId}', 'Student\StudentReportController@showDetailedReportByCourseId');

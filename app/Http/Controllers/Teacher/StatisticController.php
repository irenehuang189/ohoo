<?php
/**
 * Created by PhpStorm.
 * User: William Sentosa
 * Date: 3/27/2017
 * Time: 5:14 PM
 */

namespace App\Http\Controllers\Teacher;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

class StatisticController extends Controller
{
    private $teacher;

    public function __construct() {
        $this->teacher = Auth::user()->teacher;
    }

    public function showStatistic() {
        $teacher = $this->teacher;
        return view('teacher/statistic', compact('teacher'));
    }

    public function getHistoriNilai($courseId) {

    }

}
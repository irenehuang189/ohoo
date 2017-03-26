<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentIdTeacherIdInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('student_id')->unsigned()->nullable()->after('id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->integer('teacher_id')->unsigned()->nullable()->after('student_id');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_student_id_foreign');
            $table->dropColumn('student_id');
            $table->dropForeign('users_teacher_id_foreign');
            $table->dropColumn('teacher_id');
        });
    }
}

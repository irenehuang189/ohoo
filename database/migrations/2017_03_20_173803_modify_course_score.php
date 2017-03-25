<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyCourseScore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_score', function (Blueprint $table) {
            $table->integer('nilai')->change();
            $table->integer('nilai_praktik')->after('nilai');
            $table->char('sikap')->after('nilai_praktik');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_score', function (Blueprint $table) {
            $table->decimal('nilai', 5, 2)->change();
            $table->removeColumn('nilai_praktik');
            $table->removeColumn('sikap');
        });
    }
}

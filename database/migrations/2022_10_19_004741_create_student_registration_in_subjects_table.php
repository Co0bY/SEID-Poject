<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRegistrationInSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_registration_in_subjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('students_in_courses_id');
            $table->unsignedBigInteger('courses_disciplines_id');
            $table->float('score');
            $table->float('attendance_frequency');
            $table->timestamps();
            $table->foreign('students_in_courses_id')->references('id')->on('students_in_courses');
            $table->foreign('courses_disciplines_id')->references('id')->on('courses_disciplines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_registration_in_subjects');
    }
}

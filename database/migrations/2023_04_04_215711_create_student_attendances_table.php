<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_attendances', function (Blueprint $table) {
            $table->id();
            $table->string('month')->nullable();
            $table->integer('total_days')->nullable();
            $table->integer('attended_days')->nullable();
            $table->foreignId('college_id')->nullable();
            $table->foreign('college_id')->references('id')->on('users')->onDelete('cascade');            
            $table->foreignId('course_id')->nullable();
            $table->foreign('course_id')->references('id')->on('college_courses')->onDelete('cascade');
            $table->foreignId('semester_id')->nullable();
            $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('cascade');
            $table->foreignId('subject_id')->nullable();
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreignId('teacher_id')->nullable();
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
             $table->foreignId('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_attendances');
    }
};

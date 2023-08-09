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
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->nullable();
            $table->string('fathers_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->string('enrollment_year')->nullable();
            $table->string('roll_number')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');            
            $table->foreignId('course_id')->nullable();
            $table->foreign('course_id')->references('id')->on('college_courses')->onDelete('cascade');
            $table->foreignId('semester_id')->nullable();
            $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('cascade');
            $table->foreignId('college_id')->nullable();
            $table->foreign('college_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('student_profiles');
    }
};

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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('term')->nullable();
            $table->string('type')->nullable();
            $table->string('attendance_required')->nullable();
            $table->boolean('is_back_paper')->default(0)->nullable();
            $table->date('date')->nullable();
            $table->date('form_start_date')->nullable();
            $table->date('form_last_date')->nullable();
            $table->float('form_fee')->nullable();
            $table->float('late_fee')->nullable();
            $table->foreignId('course_id')->nullable();
            $table->foreign('course_id')->references('id')->on('college_courses')->onDelete('cascade');
            $table->foreignId('semester_id')->nullable();
            $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('cascade');
            $table->foreignId('subject_id')->nullable();
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
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
        Schema::dropIfExists('exams');
    }
};

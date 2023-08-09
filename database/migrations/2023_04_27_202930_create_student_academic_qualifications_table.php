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
        Schema::create('student_academic_qualifications', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_exam')->nullable();
            $table->string('name_of_board')->nullable();
            $table->string('attended_school')->nullable();
            $table->string('passing_year')->nullable();
            $table->string('total_marks')->nullable();
            $table->string('marks')->nullable();
            $table->string('percentage')->nullable(); 
            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('student_academic_qualifications');
    }
};

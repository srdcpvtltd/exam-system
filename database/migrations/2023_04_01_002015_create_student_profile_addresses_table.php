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
        Schema::create('student_profile_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('landmark')->nullable();
            $table->string('address')->nullable();
            $table->string('town')->nullable();
            $table->string('pin')->nullable();
            $table->string('type')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreignId('state_id')->nullable();
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreignId('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('student_profile_id')->nullable();
            $table->foreign('student_profile_id')->references('id')->on('student_profiles')->onDelete('cascade');
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
        Schema::dropIfExists('student_profile_addresses');
    }
};

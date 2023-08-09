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
        Schema::create('college_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->nullable();
            $table->string('college_name')->nullable();
            $table->string('principal_name')->nullable();
            $table->foreignId('state_id')->nullable();
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreignId('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->string('district')->nullable();
            $table->string('year_of_establishment')->nullable();
            $table->string('address')->nullable();
            $table->string('certificate')->nullable();
            $table->string('document')->nullable();
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
        Schema::dropIfExists('college_profiles');
    }
};

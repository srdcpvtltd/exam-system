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
        Schema::table('student_profile_addresses', function (Blueprint $table) {
            $table->string('premise_name')->nullable();
            $table->string('plot_no')->nullable();
            $table->string('locality')->nullable();
            $table->string('sub_locality')->nullable();
            $table->string('village')->nullable();
            $table->string('post_office')->nullable();
            $table->foreignId('police_station_id')->nullable();
            $table->foreign('police_station_id')->references('id')->on('police_stations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_profile_addresses', function (Blueprint $table) {
            $table->dropColumn('premise_name');
            $table->dropColumn('plot_no');
            $table->dropColumn('locality');
            $table->dropColumn('sub_locality');
            $table->dropColumn('village');
            $table->dropColumn('post_office');
            $table->dropColumn('police_station_id');
        });
    }
};

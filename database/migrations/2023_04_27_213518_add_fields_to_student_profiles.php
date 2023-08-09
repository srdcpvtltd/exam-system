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
        Schema::table('student_profiles', function (Blueprint $table) {
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('mother_first_name')->nullable();
            $table->string('mother_middle_name')->nullable();
            $table->string('mother_last_name')->nullable();
            $table->string('father_first_name')->nullable();
            $table->string('father_middle_name')->nullable();
            $table->string('father_last_name')->nullable();
            $table->string('guardian_first_name')->nullable();
            $table->string('guardian_middle_name')->nullable();
            $table->string('guardian_last_name')->nullable();
            $table->string('day')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('alternative_phone')->nullable();
            $table->string('caste')->nullable();
            $table->string('aadhar_no')->nullable();
            $table->string('security_question')->nullable();
            $table->string('persons_with_disability')->default(0)->nullable();
            $table->string('ex_service_man')->default(0)->nullable();
            $table->string('religion')->nullable();
            $table->string('other_nationality_1')->nullable();
            $table->string('other_nationality_2')->nullable();
            $table->string('mother_tongue')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_profiles', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('middle_name');
            $table->dropColumn('last_name');
            $table->dropColumn('mother_first_name');
            $table->dropColumn('mother_middle_name');
            $table->dropColumn('mother_last_name');
            $table->dropColumn('father_first_name');
            $table->dropColumn('father_middle_name');
            $table->dropColumn('father_last_name');
            $table->dropColumn('guardian_first_name');
            $table->dropColumn('guardian_middle_name');
            $table->dropColumn('guardian_last_name');
            $table->dropColumn('day');
            $table->dropColumn('month');
            $table->dropColumn('year');
            $table->dropColumn('alternative_phone');
            $table->dropColumn('aadhar_no');
            $table->dropColumn('security_question');
            $table->dropColumn('caste');
            $table->dropColumn('persons_with_disability');
            $table->dropColumn('ex_service_man');
            $table->dropColumn('religion');
            $table->dropColumn('other_nationality_1');
            $table->dropColumn('other_nationality_2');
            $table->dropColumn('mother_tongue');
        });
    }
};

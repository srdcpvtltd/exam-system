<?php

/****************** COLLEGE MIDDLEWARE PAGES ROUTES START****************/

use App\Http\Controllers\College\StudentAttendanceController;
use App\Http\Controllers\College\StudentController;
use App\Http\Controllers\College\StudentProfileController;
use App\Http\Controllers\College\TeacherProfileController;

Route::group(['prefix' => 'college', 'as'=>'college.','middleware' => 'auth:user','college'], function () { 
    /*******************DASHBOARD ROUTE START*************/       
    Route::view('dashboard','college.dashboard.index')->name('dashboard.index');
    /*******************DASHBOARD ROUTE END*************/     
      
    /*******************STUDENT ROUTE START*************/  
    /*******************COLLEGE PROFILE ROUTE START*************/ 
    Route::resource('student_profile',StudentProfileController::class);
    /*******************COLLEGE PROFILE ROUTE END*************/ 
    Route::get('user/verified/{id}',[StudentController::class,'verified'])->name('student.verified');
    Route::get('user/revert_verification/{id}',[StudentController::class,'revert_verification'])->name('student.revert_verification');
    Route::get('user/active/{id}',[StudentController::class,'active'])->name('student.active');
    Route::get('user/in_active/{id}',[StudentController::class,'in_active'])->name('student.in_active');
    Route::resource('student',StudentController::class);
    /*******************STUDENT ROUTE END*************/    
    /*******************TEACHER PROFILE ROUTE START*************/ 
    Route::resource('teacher_profile',TeacherProfileController::class);
    /*******************TEACHER PROFILE ROUTE END*************/
    /*******************STUDENT ATTENDANCE ROUTE START*************/ 
    Route::post('get_stduents_for_attendance',[StudentAttendanceController::class,'getStudents'])->name('student_attendance.get_student');
    Route::resource('student_attendance',StudentAttendanceController::class);
    /*******************STUDENT ATTENDANCE ROUTE END*************/
});
/****************** COLLEGE MIDDLEWARE PAGES ROUTES END****************/
?>
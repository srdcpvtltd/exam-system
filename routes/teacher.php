<?php

/****************** TEACHER MIDDLEWARE PAGES ROUTES START****************/

use App\Http\Controllers\Teacher\StudentAttendanceController;

Route::group(['prefix' => 'teacher', 'as'=>'teacher.','middleware' => 'auth:user','teacher'], function () { 
    /*******************DASHBOARD ROUTE START*************/       
    Route::view('dashboard','teacher.dashboard.index')->name('dashboard.index');
    /*******************DASHBOARD ROUTE END*************/   
    /*******************STUDENT ATTENDANCE ROUTE START*************/ 
    Route::post('get_stduents_for_attendance',[StudentAttendanceController::class,'getStudents'])->name('student_attendance.get_student');
    Route::resource('student_attendance',StudentAttendanceController::class);
    /*******************STUDENT ATTENDANCE ROUTE END*************/  
});
/****************** TEACHER MIDDLEWARE PAGES ROUTES END****************/
?>
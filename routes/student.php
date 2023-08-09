<?php

/****************** STUDENT MIDDLEWARE PAGES ROUTES START****************/

use App\Http\Controllers\Student\ExamController;

Route::group(['prefix' => 'student', 'as'=>'student.','middleware' => 'auth:user','student'], function () { 
    /*******************DASHBOARD ROUTE START*************/       
    Route::view('dashboard','student.dashboard.index')->name('dashboard.index');
    /*******************DASHBOARD ROUTE END*************/                      
    /*******************EXAM ROUTE START*************/       
    Route::resource('exam',ExamController::class);
    /*******************CITY ROUTE END*************/ 
});
/****************** STUDENT MIDDLEWARE PAGES ROUTES END****************/
?>
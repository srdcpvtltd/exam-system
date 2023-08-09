<?php

/****************** PROSPECT MIDDLEWARE PAGES ROUTES START****************/

use App\Http\Controllers\Prospect\AuthController;
use App\Http\Controllers\Prospect\DashboardController;
use App\Http\Controllers\Prospect\StudentAcademicQualificationController;
/*******************REGISTER ROUTE START*************/      
Route::view('prospect/register','prospect.auth.register');
Route::post('prospect/register',[AuthController::class,'register'])->name('prospect.register');
Route::post('prospect/payment_callback', [DashboardController::class, 'payment_callback'])->name('prospect.dashboard.payment_callback');
Route::group(['prefix' => 'prospect', 'as'=>'prospect.','middleware' => 'auth:user','prospect'], function () { 
    /*******************DASHBOARD ROUTE START*************/       
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard.index');  
    Route::post('dashboard/student_profile_create',[DashboardController::class,'studentProfileCreate'])->name('dashboard.student_profile_create');  
    Route::post('dashboard/student_profile_update',[DashboardController::class,'studentProfileUpdate'])->name('dashboard.student_profile_update');  
    Route::post('dashboard/student_address_create',[DashboardController::class,'studentAddressCreate'])->name('dashboard.student_address_create');  
    Route::post('dashboard/student_qualification_create',[DashboardController::class,'studentQualificationCreate'])->name('dashboard.student_qualification_create');  
    Route::post('dashboard/student_document_create',[DashboardController::class,'studentDocumentCreate'])->name('dashboard.student_document_create');  
    Route::post('dashboard/student_address_update',[DashboardController::class,'studentAddressUpdate'])->name('dashboard.student_address_update');  
    Route::post('dashboard/student_document_update',[DashboardController::class,'studentDocumentUpdate'])->name('dashboard.student_document_update');  
    Route::post('dashboard/student_qualification_update',[DashboardController::class,'studentQualificationUpdate'])->name('dashboard.student_qualification_update');  
    Route::post('dashboard/get_qualification_fields',[DashboardController::class,'getQualificationFields'])->name('dashboard.get_qualification_fields');  
    Route::get('dashboard/get_back_steps',[DashboardController::class,'getBackSteps'])->name('dashboard.get_back_steps');  
    Route::get('dashboard/download_document/{id}',[DashboardController::class,'downloadFile'])->name('dashboard.download_document');
    Route::get('generate_pdf', [DashboardController::class, 'generateApllicationForm'])->name('dashboard.generate_pdf');
    Route::view('payment/process','prospect.application.payment')->name('payment.process');
    /*******************DASHBOARD ROUTE END*************/ 
    Route::resource('academic_qualification',StudentAcademicQualificationController::class);
});
/****************** PROSPECT MIDDLEWARE PAGES ROUTES END****************/
?>
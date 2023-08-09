<?php 
/****************** ADMIN MIDDLEWARE PAGES ROUTES START****************/

use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CollegeController;
use App\Http\Controllers\Admin\CollegeCourseController;
use App\Http\Controllers\Admin\CollegeProfileController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\EntranceFeeController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\GradeCategoryController;
use App\Http\Controllers\Admin\GradeController;
use App\Http\Controllers\Admin\PoliceStationController;
use App\Http\Controllers\Admin\ProspectController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\StudentAttendanceController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\UserController;

Route::group(['prefix' => 'admin', 'as'=>'admin.','middleware' => 'auth:user','admin'], function () { 
    /*******************DASHBOARD ROUTE START*************/       
    Route::view('dashboard','admin.dashboard.index')->name('dashboard.index');
    /*******************DASHBOARD ROUTE END*************/       
    /*******************USER ROUTE START*************/       
    Route::get('user/verified/{id}',[UserController::class,'verified'])->name('user.verified');
    Route::get('user/revert_verification/{id}',[UserController::class,'revert_verification'])->name('user.revert_verification');
    Route::get('user/active/{id}',[UserController::class,'active'])->name('user.active');
    Route::get('user/in_active/{id}',[UserController::class,'in_active'])->name('user.in_active');
    Route::resource('user',UserController::class);
    /*******************USER ROUTE END*************/             
    /*******************COLLEGE ROUTE START*************/       
    Route::resource('college',CollegeController::class);  
    /*******************COLLEGE PROFILE ROUTE START*************/       
    Route::get('college_profile/download/{id}',[CollegeProfileController::class,'downloadFile'])->name('college_profile.download');
    Route::resource('college_profile',CollegeProfileController::class);
    /*******************COLLEGE PROFILE ROUTE END*************/   
    /*******************COLLEGE COURSE ROUTE START*************/       
    Route::resource('college_course',CollegeCourseController::class);
    /*******************COLLEGE PROFILE ROUTE END*************/    
    /*******************COLLEGE ROUTE END*************/             
    /*******************STUDENT ROUTE START*************/  
    /*******************COLLEGE PROFILE ROUTE START*************/       
    Route::resource('student_profile',StudentProfileController::class);
    /*******************COLLEGE PROFILE ROUTE END*************/         
    Route::resource('student',StudentController::class);
    /*******************STUDENT ROUTE END*************/      
    /*******************PROSPECT ROUTE END*************/     
    Route::post('status_update',[ProspectController::class,'statusUpdate'])->name('prospect.status_update');
    Route::resource('prospect',ProspectController::class);
    /*******************PROSPECT ROUTE END*************/    
    /*******************TEACHER ROUTE START*************/       
    Route::resource('teacher',TeacherController::class);
    /*******************TEACHER ROUTE END*************/    
    /*******************COURSE ROUTE START*************/       
    Route::resource('course',CourseController::class);
    /*******************COURSE ROUTE END*************/          
    /*******************SEMESTER ROUTE START*************/       
    Route::resource('semester',SemesterController::class);
    /*******************SEMESTER ROUTE END*************/         
    /*******************SUBJECT ROUTE START*************/       
    Route::post('subject/get_course_semsters',[SubjectController::class,'getCourseSemsters'])->name('subject.get_course_semsters');
    Route::resource('subject',SubjectController::class);
    /*******************SUBJECT ROUTE END*************/            
    /*******************COUNTRY ROUTE START*************/       
    Route::resource('country',CountryController::class);
    /*******************COUNTRY ROUTE END*************/            
    /*******************STATE ROUTE START*************/       
    Route::resource('state',StateController::class);
    /*******************STATE ROUTE END*************/               
    /*******************CITY ROUTE START*************/       
    Route::resource('city',CityController::class);
    /*******************CITY ROUTE END*************/    
    /*******************STUDENT ATTENDANCE ROUTE START*************/ 
    Route::post('get_students_for_attendance',[StudentAttendanceController::class,'getStudents'])->name('student_attendance.get_student');
    Route::post('force_allowed',[StudentAttendanceController::class,'forceAllowed'])->name('student_attendance.force_allowed');
    Route::resource('student_attendance',StudentAttendanceController::class);
    /*******************STUDENT ATTENDANCE ROUTE END*************/                 
    /*******************EXAM ROUTE START*************/       
    Route::resource('exam',ExamController::class);
    /*******************EXAM ROUTE END*************/      
    /*******************GRADE CATEGORY ROUTE START*************/       
    Route::resource('grade_category',GradeCategoryController::class);
    /*******************GRADE CATEGORY ROUTE END*************/   
    /*******************GRADE ROUTE START*************/       
    Route::resource('grade',GradeController::class);
    /*******************GRADE  ROUTE END*************/   
    /*******************POLICE STATION ROUTE START*************/       
    Route::resource('police_station',PoliceStationController::class);
    /*******************POLICE STATION  ROUTE END*************/   
    /*******************ENTRANCE FEE ROUTE START*************/       
    Route::resource('entrance_fee',EntranceFeeController::class);
    /*******************ENTRANCE FEE ROUTE END*************/   
});
/****************** ADMIN MIDDLEWARE PAGES ROUTES END****************/
?>
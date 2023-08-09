<?php

use App\Helpers\PaymentGateway;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/******************LOGIN PAGE ROUTES START****************/
Route::view('/','auth.login');
Route::view('login','auth.login');
Route::post('login',[AuthController::class,'login'])->name('login');
/******************LOGIN PAGE ROUTES END****************/

/*******************REGISTER ROUTE START*************/      
Route::view('register','auth.register');
Route::post('register',[AuthController::class,'register'])->name('register');
/*******************REGISTER ROUTE END*************/     

/*******************LOGOUT ROUTE START*************/       
Route::get('logout',[AuthController::class,'logout'])->name('logout');
/*******************LOGOUT ROUTE END*************/     
Route::post('get_city_against_states',[AuthController::class,'getCityAgainstStates'])->name('get_city_against_states');
Route::post('get_state_against_countries',[AuthController::class,'getStateAgainstCountries'])->name('get_state_against_countries');
Route::post('get_course_aganist_college',[AuthController::class,'getCourseAganistCollege'])->name('get_course_aganist_college');
Route::post('get_semester_aganist_course',[AuthController::class,'getSemesterAganistCourse'])->name('get_semester_aganist_course');
Route::post('get_subject_aganist_semester',[AuthController::class,'getSubjectAganistSemester'])->name('get_subject_aganist_semester');
Route::get('get_course_fields',[AuthController::class,'getCourseFields'])->name('get_course_fields');


/*******************ADMIN ROUTE START*************/       
include __DIR__ . '/admin.php';
/*******************ADMIN ROUTE END*************/     

/*******************STUDENT ROUTE START*************/       
include __DIR__ . '/student.php';
/*******************STUDENT ROUTE END*************/     

/*******************COLLEGE ROUTE START*************/       
include __DIR__ . '/college.php';
/*******************COLLEGE ROUTE END*************/    

/*******************TEACHER ROUTE START*************/       
include __DIR__ . '/teacher.php';
/*******************TEACHER ROUTE END*************/  

/*******************Prospect ROUTE START*************/       
include __DIR__ . '/prospect.php';
/*******************Prospect ROUTE END*************/     
/******************FUNCTIONALITY ROUTES****************/
Route::get('cd', function() {
    Artisan::call('config:cache');
    Artisan::call('migrate:refresh');
    Artisan::call('db:seed', [ '--class' => DatabaseSeeder::class]);
    Artisan::call('view:clear');
    return 'DONE';
  });
  Route::get('migrate', function() {
    Artisan::call('config:cache');
    Artisan::call('migrate');
    Artisan::call('view:clear');
    return 'DONE';
  });
  Route::get('cache_clear', function() {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    return 'DONE';
  });
  Route::get('test', function() {
    dd(config('services.razor_pay'));
    // PaymentGateway::proccess();		
  });
  Route::get('add_categories', function() {
    
    DB::table('document_categories')->insert([
      [ 'name' => 'Passport Size Photograph'],
      [ 'name' => 'Full Signatue of the Candidate'],
      [ 'name' => 'Full Signatue of the Father'],
      [ 'name' => 'Full Signatue of the Mother'],
      [ 'name' => 'Full Signatue of the Guradian'],
      [ 'name' => 'Aadhar Card'],
      [ 'name' => 'Citizen Certificate'],
      [ 'name' => 'Caste Certificate From the Appropriate Authority'],
      [ 'name' => 'Physically Handicapped Ceertificate with Percentage of Disability from the Appropriate'],
      [ 'name' => 'Ex-Serviceman Certificate'],
      [ 'name' => '10th or Equivalent Certificate'],
      [ 'name' => '10th or Equivalent Martsheet'],
  ]);		
  });
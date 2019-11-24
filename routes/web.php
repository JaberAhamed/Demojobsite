<?php

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

use App\jobpost;

Route::get('/', function () {

    $allpost =  jobpost::all();
       $allpost = App\jobpost::paginate(2);
    return view('welcome',compact('allpost'));
});


Route::get('/company/registerform','CompanyController@companyRegisterindex')->name('companyregister');
Route::post('/company/info/store','CompanyController@companyInfoStore')->name('companyinfostore');
Route::get('/company/login','CompanyController@companyLogInindex')->name('companyloginview');
Route::post('/company/loginstore','CompanyController@companylogin')->name('companylogin');
Route::get('/company/dashbord','CompanyController@companyDashbord')->name('dashbord');
Route::get('/company/logout','CompanyController@logout')->name('logout');



Route::get('/company/jobpost','jobpostcontroller@jobpostindex')->name('jobpost');
Route::post('/jobpost/infostore','jobpostcontroller@jobpostInfoStore')->name('jobpostinfostore');




Route::get('/user/regiser','UserController@userRegisterIndex')->name('userregister');
Route::post('/user/infostore','UserController@userInfoStore')->name('userRegisterInfo');
Route::get('/user/loginview','UserController@userloginindex')->name('userloginview');
Route::post('/user/login','UserController@userLogin')->name('userlogin');
Route::get('/user/profile','UserController@userprofile')->name('userprofile');
Route::get('/user/logout','UserController@userlogout')->name('userlogout');



Route::post('/user/updateuser/prifile','JobseekerController@updateuserprofile')->name('udateUserProfile');


Route::get('/apply/forjob/{id}','JobPostActivityController@jobpostforUser_Company');

Route::get('/user/allapplicant','JobPostActivityController@allapplicant')->name('allapplicant');







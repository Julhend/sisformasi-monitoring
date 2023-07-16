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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('dashboard', function () {
   return view('layouts.master');
});



Route::group(['middleware' => 'auth'], function () {
   
//---------------------------------------------------------------------------------------------------------------
Route::resource('users','UserController');
Route::get('/apiUsers','UserController@apiUsers')->name('api.users');
Route::get('/exportUsers','UserController@exportUsersAll')->name('exportPDF.usersAll');
//---------

// Route::resource('masterlist','MasterListController');
// Route::get('/apiMasterlist','MasterListController@apiMasterLists')->name('api.masterlists');

Route::resource('digitalcaliper','DigitalCaliperController');
Route::get('/apiDigitalCaliper','DigitalCaliperController@apiDigitalCalipers')->name('api.digitalcaliper');
Route::get('/digitalcaliper/{id}/approved','DigitalCaliperController@approved')->name('approved');
Route::get('/digitalcaliper/{id}/reject','DigitalCaliperController@reject')->name('reject');
//---------------------------------------------------------------------------------------------------------------
Route::resource('threadgauge','ThreadGaugeController');
Route::get('/apiThreadGauge','ThreadGaugeController@apiThreadGauges')->name('api.threadgauge');
Route::get('/threadgauge/{id}/approved','ThreadGaugeController@approved')->name('approved');
Route::get('/threadgauge/{id}/reject','ThreadGaugeController@reject')->name('reject');
//---------------------------------------------------------------------------------------------------------------

Route::resource('outsidedial','OutsideDialController');
Route::get('/apiOutsideDial','OutsideDialController@apiOutsideDials')->name('api.outsidedial');
Route::get('/outsidedial/{id}/approved','OutsideDialController@approved')->name('approved');
Route::get('/outsidedial/{id}/reject','OutsideDialController@reject')->name('reject');
//---------------------------------------------------------------------------------------------------------------
Route::resource('masterlist','MasterListController');
Route::get('/apiMasterList','MasterListController@apiMasterLists')->name('api.masterlist');
Route::get('/cetakMasterlist','MasterListController@exportMasterlistAll')->name('exportPDF.masterlistAll');
Route::get('/cetakMasterlistPeriod','MasterListController@exportMasterlistPeriod')->name('exportPDF.masterlistPeriod');
//---------------------------------------------------------------------------------------------------------------

});


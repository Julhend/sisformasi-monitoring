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
//---------------------------------------------------------------------------------------------------------------
Route::resource('threadgauge','ThreadGaugeController');
Route::get('/apiThreadGauge','ThreadGaugeController@apiThreadGauges')->name('api.threadgauge');
//---------------------------------------------------------------------------------------------------------------

Route::resource('outsidedial','OutsideDialController');
Route::get('/apiOutsideDial','OutsideDialController@apiOutsideDials')->name('api.outsidedial');
//---------------------------------------------------------------------------------------------------------------




    // Route::resource('productsIn','ProductMasukController');
    // Route::get('/apiProductsIn','ProductMasukController@apiProductsIn')->name('api.productsIn');
    // Route::get('/exportProductMasukAll','ProductMasukController@exportProductMasukAll')->name('exportPDF.productMasukAll');
    // Route::get('/exportProductMasukAllExcel','ProductMasukController@exportExcel')->name('exportExcel.productMasukAll');
    // Route::get('/exportProductMasuk/{id}','ProductMasukController@exportProductMasuk')->name('exportPDF.productMasuk');
});


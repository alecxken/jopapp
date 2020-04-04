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
    return view('welcome');
});

Route::get('/apply', function () {
    return view('apply');
});
Route::get('/applynow', function () {
    return view('step');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/job', 'JobController@create');



Route::get('/apply-now/{id}', 'JobController@applynow');
Route::post('/startapp', 'JobController@startapp')->name('cert');


Route::post('/job-reg', 'JobController@store')->name('cert');
Route::post('/cert', 'ApplicationController@cert')->name('cert');
Route::post('/education', 'ApplicationController@education')->name('education');
Route::post('/membership', 'ApplicationController@membership')->name('membership');
Route::post('/other', 'ApplicationController@other')->name('other');
Route::post('/employee', 'ApplicationController@employee')->name('employee');
Route::post('/referee', 'ApplicationController@referee')->name('referee');
Route::post('/attach', 'ApplicationController@attach')->name('attach');


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
    return redirect('home');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/apply', function () {
    return view('apply');
});

Route::get('/apply1', function () {
    return view('apply1');
});


Route::get('/applynow', function () {
    return view('step');
});
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'AdminController@index')->name('Dashboard');
Route::get('/dashboard', 'AdminController@index')->name('Dashboard');
Route::get('/job', 'JobController@create');



Route::get('/my-apps', 'JobController@show');
Route::get('/apply-now/{id}', 'JobController@applynow');
Route::post('/startapp', 'JobController@startapp')->name('cert');


Route::post('/job-reg', 'JobController@store')->name('cert');
Route::post('/cert', 'ApplicationController@cert')->name('cert');
Route::post('/education', 'ApplicationController@education')->name('education');
Route::post('/membership', 'ApplicationController@membership')->name('membership');
Route::post('/other', 'ApplicationController@other')->name('other');
Route::post('/employee', 'ApplicationController@employee')->name('employee');
Route::post('/referee', 'ApplicationController@referee')->name('referee');
Route::post('/attachment', 'ApplicationController@attach')->name('attach');

Route::get('/jobs-apps', 'JobController@create1');
Route::get('/my-apps1', 'JobController@show1');
Route::get('/my-ref/{ref}/{token}', 'JobController@stage');
// stage
// Route::get('/apply1/{id}', 'JobController@apply1');
Route::get('/apply-job1/{id}', 'JobController@applynow1');
Route::get('/apply-jobnow/{id}', 'JobController@applyjobnow');
Route::get('/applicants', 'JobController@applicants');
Route::post('/startapp1', 'JobController@startapp1')->name('cert');



Route::post('/job-reg1', 'JobController@store')->name('cert1');
Route::post('/cert1', 'ApplicationController@cert1')->name('cert1');
Route::post('/education1', 'ApplicationController@education1')->name('education');
Route::post('/membership1', 'ApplicationController@membership1')->name('membership');
Route::post('/other1', 'ApplicationController@other1')->name('other');
Route::post('/employee1', 'ApplicationController@employee1')->name('employee');
Route::post('/referee1', 'ApplicationController@referee1')->name('referee');
Route::post('/attachment1', 'ApplicationController@attach1')->name('attach');


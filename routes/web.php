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

Route::get('/register', function () {
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
Route::get('/download', 'ApplicationController@report');
Route::post('/view-applicant', 'ApplicationController@reportpost');
Route::get('/view-applicants', 'ApplicationController@reportsall');
Route::get('/view-experience', 'ApplicationController@experience');
Route::get('/readtxt', 'ApplicationController@readtxt');
Route::get('/view-checklist', 'ApplicationController@checklist');
Route::get('/view-applicant/{id}', 'ApplicationController@reportspecific');


Route::get('/view-job-details/{id}', 'JobController@job_details');
Route::get('/view-individual-details/{id}', 'JobController@individual_details');
Route::get('/delete-details/{id}', 'JobController@drop_applicant');

Route::get('/get-applicant-summary', 'AdminController@applicantdata');
Route::get('/update-data', 'AdminController@updatedata');

Route::post('/download-accounts/{id}', 'AdminController@downloadfile');



Route::get('/summary-app', 'JobController@summary_app');
Route::get('/summary-applicants', 'ApplicationController@reportsall');

Route::get('/my-apps', 'JobController@show');
Route::get('/delete-all/{id}', 'ApplicationController@deleteall');
Route::get('/apply-now/{id}', 'JobController@applynow');
Route::post('/startapp', 'JobController@startapp')->name('cert');
Route::get('/deletejob/{id}', 'JobController@deletejob');

Route::get('/job_checks', 'JobController@jobchecklist');
Route::get('/job_check/{id}', 'JobController@checklist_details');
#update users details()

Route::post('/update-persondetails', 'ApplicationController@update_person');
Route::post('/update-user-cert', 'ApplicationController@update_cert');


Route::post('/job-reg', 'JobController@store')->name('cert');
Route::post('/cert', 'ApplicationController@cert')->name('cert');
Route::post('/education', 'ApplicationController@education')->name('education');
Route::post('/membership', 'ApplicationController@membership')->name('membership');
Route::post('/other', 'ApplicationController@other')->name('other');
Route::post('/employee', 'ApplicationController@employee')->name('employee');
Route::post('/referee', 'ApplicationController@referee')->name('referee');
Route::post('/attachment', 'ApplicationController@attach')->name('attach');

Route::get('/jobs-apps', 'JobController@create1');

Route::get('/jobs-apps-steps/{id}', 'JobController@step_one');
Route::get('/jobs-apps-steps-two/{id}', 'JobController@step_two');
Route::get('/jobs-apps-steps-three/{id}', 'JobController@step_three');

Route::get('/drop-education/{token}', 'JobController@drop_education');
Route::get('/drop-certs/{token}', 'JobController@drop_certs');
Route::get('/drop-membership/{token}', 'JobController@drop_membership');
Route::get('/drop-others/{token}', 'JobController@drop_others');
Route::get('/drop-referee/{token}', 'JobController@drop_referee');
Route::get('/drop-employer/{token}', 'JobController@drop_employer');



Route::get('/my-apps1', 'JobController@show1');
Route::get('/all-apps', 'JobController@showapps');
Route::get('/show-persons', 'JobController@showpersons');
Route::get('/drop-app/{id}', 'JobController@dropapp');
Route::get('/view-app/{id}', 'JobController@viewapp');

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

//permissions and Roles
Route::resource('admin', 'UserController');
Route::resource('roles', 'RoleController');
//roles RouteServiceProvider
Route::get('/roles_index','RoleController@index');
Route::get('/roles_create','RoleController@create');

Route::post('/roles_store','RoleController@store');
Route::post('/roles_update/{id}','RoleController@update');
Route::post('/roles_destroy/{id}','RoleController@destroy');
Route::post('/roles_edit/{id}','RoleController@edit');
Route::post('/roles_show/{id}','RoleController@show');

//permissions and Roles
Route::get('/user_index','UserController@index');
Route::get('/user_create','UserController@create');
Route::get('/users_create','UserController@create');
Route::post('/user_stores','UserController@storez');

Route::post('/user_store','UserController@store');
Route::post('/user_update/{id}','UserController@update');
Route::get('/user_destroy/{id}','UserController@destroy');
Route::post('/user_edit/{id}','UserController@edit');
Route::post('/user_show/{id}','UserController@show');

//permissions and Roles
Route::get('/permissions_index','PermissionController@index');
Route::get('/permission_create','PermissionController@create');
Route::post('/permissions_store','PermissionController@store');
Route::post('/permissions_update/{id}','PermissionController@update');
Route::post('/permissions_destroy/{id}','PermissionController@destroy');
Route::post('/permission_edit/{id}','PermissionController@edit');
Route::post('/permission_show/{id}','PermissionController@show');
Route::resource('/permissions', 'PermissionController');



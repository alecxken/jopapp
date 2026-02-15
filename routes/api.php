<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Dashboard API Routes
Route::prefix('dashboard')->group(function () {
    Route::get('/summary-stats', 'App\Http\Controllers\DashboardApiController@summaryStats');
    Route::get('/application-status', 'App\Http\Controllers\DashboardApiController@applicationStatusBreakdown');
    Route::get('/applications-by-job', 'App\Http\Controllers\DashboardApiController@applicationsByJob');
    Route::get('/applications-timeline', 'App\Http\Controllers\DashboardApiController@applicationsTimeline');
    Route::get('/geographic-distribution', 'App\Http\Controllers\DashboardApiController@geographicDistribution');
    Route::get('/gender-distribution', 'App\Http\Controllers\DashboardApiController@genderDistribution');
    Route::get('/data-entry-productivity', 'App\Http\Controllers\DashboardApiController@dataEntryProductivity');
    Route::get('/education-distribution', 'App\Http\Controllers\DashboardApiController@educationDistribution');
    Route::get('/salary-expectations', 'App\Http\Controllers\DashboardApiController@salaryExpectations');
    Route::get('/top-applicants', 'App\Http\Controllers\DashboardApiController@topApplicants');
    Route::get('/upcoming-deadlines', 'App\Http\Controllers\DashboardApiController@upcomingDeadlines');
    Route::get('/age-distribution', 'App\Http\Controllers\DashboardApiController@ageDistribution');
    Route::get('/experience-distribution', 'App\Http\Controllers\DashboardApiController@experienceDistribution');
    Route::get('/monthly-trends', 'App\Http\Controllers\DashboardApiController@monthlyTrends');
    Route::get('/disability-stats', 'App\Http\Controllers\DashboardApiController@disabilityStats');
});

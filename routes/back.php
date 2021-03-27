<?php
use Illuminate\Support\Facades\Route;

// admin
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('reports', 'ReportController');
Route::get('/get-index-graph-data', 'ReportController@getIndexGraphData');
Route::resource('goals', 'GoalController');
Route::get('/get-goal-graph-data', 'GoalController@getGoalGraphData');
Route::get('/get-graph-data-for-dashboard', 'DashboardController@getGraphDataForDashboard');
Route::get('error/{code}', function ($code) {
    abort($code);
});
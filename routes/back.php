<?php
use Illuminate\Support\Facades\Route;

// admin
Route::get('/', 'DashboardController@index')->name('dashboard');
Route::resource('reports', 'ReportController');
Route::get('/get-index-graph-data', 'ReportController@getIndexGraphData');
Route::resource('goals', 'GoalController');
Route::get('/get-goal-graph-data', 'GoalController@getGoalGraphData');

Route::resource('posts', 'PostController')->except('show');

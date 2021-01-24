<?php
use Illuminate\Support\Facades\Route;

// /admin
Route::get('/', 'DashboardController@index')->name('dashboard');
Route::resource('reports', 'ReportController');
Route::resource('posts', 'PostController')->except('show');

<?php
use Illuminate\Support\Facades\Route;
 
// Route::get('/test', function () {
//     echo 'front';
// });
  Route::get('/', 'TestController@index')->name('testhome');
  Route::resource('posts', 'TestController')->only(['index','show']);
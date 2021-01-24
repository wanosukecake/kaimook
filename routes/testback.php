<?php
use Illuminate\Support\Facades\Route;
 
Route::get('/', function () {
    echo 'back';
});
//  Route::get('/test', 'TestController@index')->name('testhome');
// Route::resource('posts', 'PostController')->only(['index','show']);
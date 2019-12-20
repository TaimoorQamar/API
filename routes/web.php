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

Route::group(['middleware' => ['auth']], function(){
 
    Route::get('/video', 'VideoController@index');
 
    Route::get('/uploader', 'VideoController@uploader')->name('uploader');
 
    Route::post('/upload', 'VideoController@store')->name('upload');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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

Route::group(['middleware' => ['auth'],'prefix' => 'task'], function () {

    Route::get('/', 'TaskController@viewTask');
    Route::post('/store', 'TaskController@storeTask');
    Route::put('/update/{task}','TaskController@updateTask');
    Route::put('/delete/{task}', 'TaskController@deleteTask');

});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

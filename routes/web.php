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

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');
Route::get('/create', 'TaskController@create');
Route::post('/tasks', 'TaskController@store');
Route::get('/tasks/{task}', 'TaskController@show');
Route::PUT('/tasks/{id}', 'TaskController@update');
Route::get('/tasks/{id}/edit', 'TaskController@edit');
Route::get('/delete/{id}', 'TaskController@delete');
Route::PUT('/complete/{id}', 'TaskController@complete');
Route::PUT('/incomplete/{id}', 'TaskController@incomplete');

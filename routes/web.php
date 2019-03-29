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

 /* Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();
Route::get('/', 'CreateQuizController@home');
Route::get('/dashboard', 'DashBoardController@index')->name('dashboard');
Route::get('/quiz', 'CreateQuizController@index');
Route::post('/quiz', 'CreateQuizController@answer');
Route::get('/createquiz', 'CreateQuizController@create')->name('createquiz');
Route::post('/createquiz', 'CreateQuizController@store')->name('createquiz');

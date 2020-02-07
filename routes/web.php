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
    return view('auth.login');
});

Auth::routes();
Route::get('/users','userController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/createUsers','userController@create');
Route::post('/users','userController@store')->name('createUser');
Route::get('destroyUser/{id}','userController@destroy');
Route::get('editUser/{id}','userController@edit');
Route::Post('updateUser/{id}','userController@update');
//Route::get('delete/{id}','UserController@destroy');

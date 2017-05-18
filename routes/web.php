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


Route::get('{user}/{id}','MessageController@index')->name('massage.index');

Route::post('message','MessageController@store')->name('message.store');

Route::get('/home', 'HomeController@index')->name('home');

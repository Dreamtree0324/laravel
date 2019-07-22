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

Route::get('/user/register','MainController@register');
Route::get('user/logout','MainController@logoutProcess');
Route::post('/user/login','MainController@loginProcess');
Route::post('/user/register','MainController@registerProcess');


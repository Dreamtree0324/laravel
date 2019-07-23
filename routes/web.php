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
Route::get('/user/logout','MainController@logoutProcess');
Route::post('/user/login','MainController@loginProcess');
Route::post('/user/register','MainController@registerProcess');

Route::get('/board/index', 'BoardController@listPage');
Route::get('/board/view/{id}', 'BoardController@viewPage')->where(['id'=>'[0-9]+']);

Route::group(['middleware'=>['checkLogin']],function () {
    Route::get('/board/write', 'BoardController@writePage')->middleware('checkLogin');
    Route::post('/board/write', 'BoardController@writeProcess')->middleware('checkLogin');
});
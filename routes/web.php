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

Route::get('/', 'HomeController@index');
Route::post('/', 'HomeController@query');
Route::get('/addRecord', 'HomeController@addRecord');
Route::post('/addRecord', 'HomeController@record');
Route::get('/statistics', 'HomeController@statistics');
Route::get('/sort', 'HomeController@sort');
Route::get('/addStatus', 'HomeController@addStatus');
Route::post('/addStatus', 'HomeController@addStatus2');

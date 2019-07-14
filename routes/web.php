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

Route::get('/ap','ap\ArtikelController@index');
Route::get('/ap/artikel','ap\ArtikelController@index');
Route::get('/ap/artikel/add','ap\ArtikelController@add');
Route::get('/ap/artikel/view/{id}','ap\ArtikelController@view');
Route::get('/ap/artikel/edit/{id}','ap\ArtikelController@edit');
Route::get('/ap/artikel/delete/{id}','ap\ArtikelController@delete');
Route::post('/ap/artikel/save', 'ap\ArtikelController@save');
Route::post('/ap/artikel/upload', 'ap\ArtikelController@upload');

Route::get('/ap','ap\HomeController@index');
// Route::get('/test','test\TestwController@getTest');
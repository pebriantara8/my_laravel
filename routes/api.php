<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('/artikel', 'api\ArtikelController', [
//     'except' => ['edit', 'show', 'store']
// ]);
// Route::get('/artikel/[:id]', 'api\ArtikelController', [
//     'except' => ['edit', 'show', 'store']
// ]);
Route::get('/artikel/','api\ArtikelController@index');
Route::get('/artikel/show/{id}','api\ArtikelController@show');
Route::get('/artikel/new/','api\ArtikelController@new');
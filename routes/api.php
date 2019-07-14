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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::resource('/artikel', 'api\ArtikelController', [
//     'except' => ['edit', 'show', 'store']
// ]);
// Route::get('/artikel/[:id]', 'api\ArtikelController', [
//     'except' => ['edit', 'show', 'store']
// ]);
Route::get('/artikel/','api\ArtikelController@index');
Route::get('/artikel/show/{id}','api\ArtikelController@show');
Route::get('/artikel/new/','api\ArtikelController@new');

// Route::group([
//     'prefix' => 'auth'
// ], function () {
//     Route::post('login', 'test\AuthController@login');
//     Route::post('signup', 'test\AuthController@signup');
  
//     Route::group([
//       'middleware' => 'auth:api'
//     ], function() {
//         Route::get('logout', 'test\AuthController@logout');
//         Route::get('user', 'test\AuthController@user');
//     });
// });

// login route
Route::post('login', 'APILoginController@login');
// users is a route protected by jwt
Route::middleware('jwt.auth')->get('users', function () {
    return auth('api')->user();
});
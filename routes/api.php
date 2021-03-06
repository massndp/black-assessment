<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/category', 'API\CategoryApiController@index');
Route::post('/category', 'API\CategoryApiController@create');
Route::put('/category/{id}', 'API\CategoryApiController@edit');
Route::delete('/category/{id}', 'API\CategoryApiController@destroy');

Route::get('/product', 'API\ProductApiController@index');
Route::post('/product', 'API\ProductApiController@create');
Route::put('/product/{id}', 'API\ProductApiController@edit');
Route::delete('/product/{id}', 'API\ProductApiController@destroy');

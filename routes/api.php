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

Route::get('students','API\StudentController@index');
Route::get('students/{id}','API\StudentController@show');
Route::post('students','API\StudentController@store');
Route::put('students/{id}','API\StudentController@update');
Route::delete('students/{id}','API\StudentController@destroy');

Route::post('login', 'API\AuthController@login');
Route::post('register', 'API\AuthController@register'); 

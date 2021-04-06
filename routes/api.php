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
Route::post('login', 'Api\AuthController@login');
Route::post('register', 'Api\AuthController@register');

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('customers', 'Api\CustomerController@index');
    Route::get('customers/{id}', 'Api\CustomerController@show');
    Route::post('customers', 'Api\CustomerController@store');
    Route::put('customers/{id}', 'Api\CustomerController@update');
    Route::delete('customers/{id}', 'Api\CustomerController@destroy');

    Route::get('stoks', 'Api\StokController@index');
    Route::get('stoks/{id}', 'Api\StokController@show');
    Route::post('stoks', 'Api\StokController@store');
    Route::put('stoks/{id}', 'Api\StokController@update');
    Route::delete('stoks/{id}', 'Api\StokController@destroy');

    Route::get('users', 'Api\UserController@index');
    Route::get('users/{id}', 'Api\UserController@show');
    Route::post('users', 'Api\AuthController@register');
    Route::put('users/{id}', 'Api\UserController@update');
    Route::delete('users/{id}', 'Api\UserController@destroy');

    Route::get('bahans', 'Api\BahanController@index');
    Route::get('bahans/{id}', 'Api\BahanController@show');
    Route::post('bahans', 'Api\BahanController@store');
    Route::put('bahans/{id}', 'Api\BahanController@update');
    Route::delete('bahans/{id}', 'Api\BahanController@destroy');
});

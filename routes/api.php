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
Route::post('logout', 'Api\AuthController@logout');

Route::delete('customers/{id}', 'Api\CustomerController@destroy');

Route::get('menuMobile', 'Api\MenuController@index');
Route::get('menuMobile1', 'Api\MenuController@showMobile');

Route::group(['middleware' => 'auth:api'], function() {
    
    Route::get('customers', 'Api\CustomerController@index');
    Route::get('customers/{id}', 'Api\CustomerController@show');
    Route::post('customers', 'Api\CustomerController@store');
    Route::put('customers/{id}', 'Api\CustomerController@update');
    
    Route::get('stoks', 'Api\StokController@index');
    Route::get('stoks/{id}', 'Api\StokController@show');
    Route::post('stoks', 'Api\StokController@store');
    Route::put('stoks/{id}', 'Api\StokController@update');
    Route::delete('stoks/{id}', 'Api\StokController@destroy');

    Route::get('users', 'Api\UserController@index');
    Route::get('users/{id}', 'Api\UserController@show');
    Route::post('users', 'Api\AuthController@register');
    Route::put('users/{id}', 'Api\UserController@update');
    Route::put('usersnon/{id}', 'Api\UserController@nonaktif');
    Route::delete('users/{id}', 'Api\UserController@destroy');

    Route::get('bahans', 'Api\BahanController@index');
    Route::get('bahans/{id}', 'Api\BahanController@show');
    Route::post('bahans', 'Api\BahanController@store');
    Route::put('bahans/{id}', 'Api\BahanController@update');
    Route::delete('bahans/{id}', 'Api\BahanController@destroy');

    Route::get('menus', 'Api\MenuController@index');
    Route::get('menus/{id}', 'Api\MenuController@show');
    Route::post('menus', 'Api\MenuController@store');
    Route::put('menus/{id}', 'Api\MenuController@update');
    Route::delete('menus/{id}', 'Api\MenuController@destroy');

    Route::get('mejas', 'Api\MejaController@index');
    Route::get('mejas/{id}', 'Api\MejaController@show');
    Route::post('mejas', 'Api\MejaController@store');
    Route::put('mejas/{id}', 'Api\MejaController@update');
    Route::delete('mejas/{id}', 'Api\MejaController@destroy');

    Route::get('menu2', 'Api\Menu2Controller@index');
    Route::get('menu2/{find}', 'Api\Menu2Controller@show');
    Route::post('menu2', 'Api\Menu2Controller@store');
    Route::put('menu2/{find}', 'Api\Menu2Controller@update');
    Route::delete('menu2/{find}', 'Api\Menu2Controller@destroy');
});

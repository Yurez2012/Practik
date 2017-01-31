<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


use Illuminate\Support\Facades\Auth;

Route::get('/', 'IndexController@index');

//Auth routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//News

Route::get('/', 'News\NewsController@index');



Route::group(['middleware' => 'auth'], function () {

    //Admin Panel
    Route::get('auth/admin', 'Admin\AdminController@index');

    //News
    Route::get('news/add', 'News\NewsController@create');
    Route::post('news/add', 'News\NewsController@store');
});
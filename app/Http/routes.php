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
    Route::get('auth/admin/news', 'Admin\AdminController@news');
    Route::get('auth/admin/news/{id}/edit', 'Admin\AdminController@editNews');
    Route::post('auth/admin/news/update/{id}', 'Admin\AdminController@updateNews');
    Route::post('auth/admin/news/delete/{id}', 'Admin\AdminController@destroyNews');
    Route::get('auth/admin/news/add', 'Admin\AdminController@addNews');
    Route::post('auth/admin/news/add', 'Admin\AdminController@storeNews');

    //News

});
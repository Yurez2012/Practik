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

use App\Http\Requests\LikeRequest;
use App\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

//Auth routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//News index
Route::get('/', 'NewsController@index');
Route::post('/like','NewsController@like');
Route::delete('/like/delete','NewsController@likeDelete');

Route::get('/news/{id}', 'NewsController@show');
Route::get('/category/{id}', 'NewsController@category');
Route::get('/search', 'NewsController@search');

//Page
Route::get('/about_as', 'PageController@aboutAs');

// Guard auth user
Route::group(['middleware' => 'auth'], function () {

    //Admin Panel CRUD Category News Menu
    Route::get('auth/admin', 'Admin\AdminController@index');
    Route::get('auth/admin/news/index', 'NewsController@indexAdmin');
    Route::resource('auth/admin/news', 'NewsController');
    Route::get('auth/admin/news', 'NewsController@indexAdmin');
    Route::resource('auth/admin/category', 'CategoryController');
    Route::get('auth/admin/menu/index', 'MenuController@indexAdmin');
    Route::resource('auth/admin/menu', 'MenuController');

    //diagrams
    Route::get('auth/admin/diagram/user', 'DiagramController@index');
    Route::get('auth/admin/diagram/news', 'DiagramController@news');

});
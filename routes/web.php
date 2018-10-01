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
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {

	Route::get('login', ['as' => 'login', 'uses' => 'AuthController@auth']);
	Route::post('login', 'AuthController@auth');
	Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

	Route::group(['middleware' => 'adminLogin'], function() {

		Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);

		Route::group(['prefix' => 'user'], function() {
			Route::get('index', ['as' => 'user_index', 'uses' => 'UserController@index']);
			Route::get('create', ['as' => 'user_create', 'uses' => 'UserController@create']);
		});

		Route::group(['prefix' => 'role'], function() {
			Route::get('index', ['as' => 'role_index', 'uses' => 'RoleController@index']);
			Route::get('create', ['as' => 'role_create', 'uses' => 'RoleController@create']);
		});

	});
});
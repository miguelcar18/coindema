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

Route::get('/', ['as' => 'dashboard', 'uses' => 'BackController@index']);

/***********************Login y User***********************/
Route::resource('login', 'LoginController');
Route::get('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);
Route::resource('users', 'UserController');
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
Route::get('profile/change-password', ['as' => 'change_password', 'uses' => 'LoginController@changePassword']);
Route::post('profile/change-password', ['as' => 'change_password_post', 'uses' => 'LoginController@postChangePassword']);

/*********************Departamentos************************/
Route::resource('departamentos', 'DepartamentoController');

/***********************Vehiculos**************************/
Route::resource('vehiculos', 'VehiculoController');

/*********************Inventarios**************************/
Route::resource('inventarios', 'InventarioController');

/*********************Comunicaciones***********************/
Route::resource('comunicaciones', 'ComunicacionController');

/*********************Permisos*****************************/
Route::resource('permisos', 'PermisoController');
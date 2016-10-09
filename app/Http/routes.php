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
Route::get('vehiculos/consultar/formulario', ['as' => 'vehiculos.consulta', 'uses' => 'VehiculoController@consulta']);
Route::post('vehiculos/consultar/resultados', ['as' => 'vehiculos.resultados', 'uses' => 'VehiculoController@resultados']);
Route::post('vehiculos/pdf/resultados', ['as' => 'vehiculos.pdfResultados', 'uses' => 'VehiculoController@pdfResultados']);

/*********************Inventarios**************************/
Route::resource('inventarios', 'InventarioController');
Route::get('inventarios/consultar/formulario', ['as' => 'inventarios.consulta', 'uses' => 'InventarioController@consulta']);
Route::post('inventarios/consultar/resultados', ['as' => 'inventarios.resultados', 'uses' => 'InventarioController@resultados']);
Route::post('inventarios/pdf/resultados', ['as' => 'inventarios.pdfResultados', 'uses' => 'InventarioController@pdfResultados']);

/*********************Comunicaciones***********************/
Route::resource('comunicaciones', 'ComunicacionController');
Route::get('comunicaciones/consultar/formulario', ['as' => 'comunicaciones.consulta', 'uses' => 'ComunicacionController@consulta']);
Route::post('comunicaciones/consultar/resultados', ['as' => 'comunicaciones.resultados', 'uses' => 'ComunicacionController@resultados']);
Route::post('comunicaciones/pdf/resultados', ['as' => 'comunicaciones.pdfResultados', 'uses' => 'ComunicacionController@pdfResultados']);

/*********************Permisos*****************************/
Route::resource('permisos', 'PermisoController');
Route::get('permisos/consultar/formulario', ['as' => 'permisos.consulta', 'uses' => 'PermisoController@consulta']);
Route::post('permisos/consultar/resultados', ['as' => 'permisos.resultados', 'uses' => 'PermisoController@resultados']);
Route::post('permisos/pdf/resultados', ['as' => 'permisos.pdfResultados', 'uses' => 'PermisoController@pdfResultados']);

/*********************Reportes*****************************/
Route::get('reporte/permiso/{id}', ['as' => 'reportePermiso', 'uses' => 'PermisoController@reportePermiso']);
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

Route::get('/', function () {
    return view('auth/login');
});

Route::resource('bomberos/rubro','RubroController');
Route::resource('bomberos/recibo','ReciboController');
Route::resource('seguridad/usuario','UsuarioController');
Route::resource('reportes/reportes','ReportesController');
//Route::get('reportes.create', 'ReportesController@create');
Route::get('reportes', 'ReportesController@reportes');
Route::get('reportesxrubro', 'ReportesController@reportesxrubro');
Route::auth();
Route::get('/inicio', 'HomeController@index');
Route::get('/{slug?}/{slug1?}/{slug2?}', 'ReciboController@index');

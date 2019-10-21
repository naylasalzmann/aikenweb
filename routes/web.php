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

Route::get('/', 'PagesController@home');

Route::view('/pdc', 'pdc');

Route::view('/salidas', 'ficha'); // todo: usar controller @show

Route::get('/pdc/guias', 'GuiasController@index');

Route::get('/pdc/consultas', 'ConsultasController@index');

Route::get('/pdc/reservas', 'ReservasController@index');

Route::resource('/pdc/tiposSalida', 'TiposSalidaController');

Route::resource('/pdc/condiciones', 'CondicionesController');

Route::resource('/pdc/titulos', 'TitulosController');

Route::resource('/pdc/guias', 'GuiasController');

Route::resource('/pdc/localidades', 'LocalidadesController');

Route::resource('/pdc/zonas', 'ZonasController');

Route::resource('/pdc/salidas', 'SalidasController');

Route::post('/salidas/{salida}/fechas', 'SalidaFechasController@store');

Route::patch('/fechas/{fecha}', 'SalidaFechasController@update');


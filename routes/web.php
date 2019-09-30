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

Route::get('/pdc/localidades', 'LocalidadesController@index');

Route::get('/pdc/localidades/create', 'LocalidadesController@create');

Route::get('/pdc/salidas', 'SalidasController@index'); //todo: usar resource

Route::view('/salidas', 'ficha'); // todo: usar controller @show

Route::get('/pdc/guias', 'GuiasController@index');

Route::get('/pdc/consultas', 'ConsultasController@index');

Route::get('/pdc/reservas', 'ReservasController@index');

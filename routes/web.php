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

Route::get('/', 'PagesController@index');

Route::get('/{id}', 'PagesController@show');

Route::get('/pdc/dashboard', 'DashboardController@index');

Route::view('/checkout/thanks', 'thanks');

Route::get('/pdc/guias', 'GuiasController@index'); // ver y sacar

Route::get('/pdc/consultas', 'ConsultasController@index'); // ver y sacar


Route::resource('/pdc/tiposSalida', 'TiposSalidaController');

Route::resource('/pdc/condiciones', 'CondicionesController');

Route::resource('/pdc/titulos', 'TitulosController');

Route::resource('/pdc/guias', 'GuiasController');

Route::resource('/pdc/localidades', 'LocalidadesController');

Route::resource('/pdc/zonas', 'ZonasController');

Route::resource('/pdc/salidas', 'SalidasController');

Route::post('/salidas/{salida}/fechas', 'SalidaFechasController@store');

Route::patch('/fechas/{fecha}', 'SalidaFechasController@update');

Route::get('/checkout/{id}', 'ReservasController@create');

Route::post('/pdc/reservas', 'ReservasController@store'); //ver 

Route::resource('/pdc/reservas', 'ReservasController')->only([  //ver
    'index', 'show', 'edit', 'update', 'destroy'
]);

Route::patch('/reservas/estado/{reserva}', 'ReservaEstadosController@update');

Route::resource('/pdc/confirmaciones', 'ConfirmacionesController');

Route::resource('/pdc/cancelaciones', 'CancelacionesController');

Route::resource('/pdc/cobros', 'CobrosController');

Route::resource('/pdc/aventureros', 'AventurerosController');

Route::resource('/pdc/consultas', 'ConsultasController');






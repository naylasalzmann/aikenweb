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

Route::get('/salidas', 'PagesController@salidas');

// Route::get('/pdc', 'PagesController@pdc');

Route::view('/pdc', 'pdc');


Route::view('/pdc/localidades', 'localidades'); // crear un controller

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

Route::get('/', function () {
    return view('contenido.contenido');
});

Route::get('/categoria', 'CategoryController@index');
Route::post('/categoria/store', 'CategoryController@store');
Route::put('/categoria/update', 'CategoryController@update');
Route::put('/categoria/desactivar', 'CategoryController@desactivar');
Route::put('/categoria/activar', 'CategoryController@activar');

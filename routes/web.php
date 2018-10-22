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
Route::get('/categoria/selectCategoria', 'CategoryController@selectCategoria');


Route::get('/articulo', 'ArticulosController@index');
Route::post('/articulo/store', 'ArticulosController@store');
Route::put('/articulo/update', 'ArticulosController@update');
Route::put('/articulo/desactivar', 'ArticulosController@desactivar');
Route::put('/articulo/activar', 'ArticulosController@activar');

Route::get('/cliente', 'PersonasController@index');
        Route::post('/cliente/registrar', 'PersonasController@store');
        Route::put('/cliente/actualizar', 'PersonasController@update');
        Route::get('/cliente/selectCliente', 'PersonasController@selectCliente');

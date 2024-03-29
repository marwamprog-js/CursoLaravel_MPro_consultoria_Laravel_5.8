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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name("home");

Route::get('/categorias', 'ControladorCategoria@index')->name('categorias');
Route::get('/categorias/nova', 'ControladorCategoria@create')->name('categorias.create');
Route::post('/categorias', 'ControladorCategoria@store')->name('categorias.store');
Route::get('/categorias/{id}/apagar', 'ControladorCategoria@destroy')->name('categorias.destroy');
Route::get('/categorias/{id}/editar', 'ControladorCategoria@edit')->name('categorias.edit');
Route::post('/categorias/{id}', 'ControladorCategoria@update')->name('categorias.update');


Route::get('/produtos', 'ControladorProduto@indexView')->name('produtos');


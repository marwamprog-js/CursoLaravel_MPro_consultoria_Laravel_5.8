<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

## CATEGORIA
Route::get('/categorias/get-all', 'ControladorCategoria@getAllJson');

## PRODUTO
Route::get('/produtos', 'ControladorProduto@index');
Route::post('/produtos', 'ControladorProduto@store');
Route::get('/produtos/{id}', 'ControladorProduto@show');
Route::delete('/produtos/{id}', 'ControladorProduto@destroy');
Route::put('/produtos/{id}', 'ControladorProduto@update');
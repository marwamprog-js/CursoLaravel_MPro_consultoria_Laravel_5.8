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

Route::get('/', 'PostControlador@index')->name('index');
Route::post('/', 'PostControlador@store')->name('index.store');
Route::delete('/{id}', 'PostControlador@destroy')->name('index.destroy');
Route::get('/download/{id}', 'PostControlador@download')->name('download');

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', 'PostControlador@index')->name('post.index');
Route::get('/like/{id}', 'PostControlador@like')->name('post.like');
Route::post('/', 'PostControlador@store')->name('post.store');
Route::delete('/{id}', 'PostControlador@destroy')->name('post.destroy');

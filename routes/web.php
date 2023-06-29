<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\HomeController@index');


Route::get('/pages', 'App\Http\Controllers\PageController@index');
Route::get('/pages/create', 'App\Http\Controllers\PageController@create');
Route::get('/pages/{id}/edit', 'App\Http\Controllers\PageController@edit');
Route::post('/pages', 'App\Http\Controllers\PageController@insert');
Route::put('/pages', 'App\Http\Controllers\PageController@update');
Route::delete('/pages/{id}', 'App\Http\Controllers\PageController@delete');


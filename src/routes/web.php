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

Route::get('todos', 'TodoController@index');
Route::get('todos/create', 'TodoController@create');
Route::post('todos', 'TodoController@store');
Route::get('todos/{id}', 'TodoController@show');
Route::get('todos/{id}/edit', 'TodoController@edit');
Route::put('todos/{id}', 'TodoController@update');
Route::delete('todos/{id}', 'TodoController@destroy');

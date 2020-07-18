<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Crud
Route::get('/crud', 'CrudController@index');
Route::post('/crud/store', 'CrudController@store');
Route::get('/crud/delete/{id}', 'CrudController@destroy');
Route::get('/crud/edit/{id}', 'CrudController@edit');
Route::post('/crud/update', 'CrudController@update');
Route::get('/crud/view/{id}', 'CrudController@show');
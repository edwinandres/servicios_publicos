<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

//Route::resource('/servicios', 'ServiciosPublicosController');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//mis rutas

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/servicios/index', 'ServiciosPublicosController@index')->name('servicios.index');

Route::get('/servicios/{id}/edit', 'ServiciosPublicosController@edit')->name('servicios.edit');

Route::get('/servicios/create', 'ServiciosPublicosController@create')->name('servicios.create');

Route::patch('/servicios/{id}', 'ServiciosPublicosController@update')->name('servicios.update');

Route::post('/servicios', 'ServiciosPublicosController@store')->name('servicios.store');

Route::delete('/servicios/{id}', 'ServiciosPublicosController@destroy')->name('servicios.destroy');





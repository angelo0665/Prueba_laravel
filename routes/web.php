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



Route::group(['middleware' => ['web']], function () {
       Route::get('/', function () {
    return view('welcome');
});

Route::match(['put', 'patch'], '/clientes/update/{id}','ClienteController@update')->name('cliente.update');
Route::get('clientes/index', 'ClienteController@index')->name('cliente.index');
Route::post('clientes/store', 'ClienteController@store')->name('cliente.store');
Route::post('clientes/create', 'ClienteController@create')->name('cliente.create');
Route::resource('clientes', 'ClienteController');

});
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

route::resource('paciente', 'PacienteController');
route::resource('doenca_base', 'Doenca_baseController');
route::resource('gravidade', 'GravidadeController');
route::resource('tipos_imediata', 'Tipos_imediataController');
route::resource('tipos_tardia', 'Tipos_tardiaController');
route::resource('transfusao', 'TransfusaoController');
route::resource('ficha', 'FichaController');

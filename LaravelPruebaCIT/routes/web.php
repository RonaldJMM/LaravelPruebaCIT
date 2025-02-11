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

require (__DIR__ . '/PaginaPrincipal/routesPaginaPrincipal.php');
require (__DIR__ . '/Usuario/routesUsuario.php');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::redirect('/','home');

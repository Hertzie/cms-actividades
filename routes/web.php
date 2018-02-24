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

Route::prefix('administrar')->middleware('role:superadministrator|administrator|editor|author|contributor')->group(function(){
    Route::get('/dashboard', 'AdministrarController@dashboard')->name('administrar.dashboard');
    Route::get('/', 'AdministrarController@index');
    Route::resource('/usuarios', 'UserController');
    Route::resource('/permisos', 'PermisosController', ['except' => 'destroy']);
    Route::resource('/roles', 'RolesController', ['except' => 'destroy']);
});

Route::get('/home', 'HomeController@index')->name('home');

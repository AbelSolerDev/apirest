<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//ruta para clients
Route::get('/clients', 'App\Http\Controllers\ClientController@index');
Route::post('/clients', 'App\Http\Controllers\ClientController@store');
Route::get('/clients/{client}', 'App\Http\Controllers\ClientController@show');
Route::put('/clients/{client}', 'App\Http\Controllers\ClientController@update');
Route::delete('/clients/{client}', 'App\Http\Controllers\ClientController@destroy');

//hacer lo mismo para services
Route::get('/services', 'App\Http\Controllers\ServiceController@index');
Route::post('/services', 'App\Http\Controllers\ServiceController@store');
Route::get('/services/{service}', 'App\Http\Controllers\ServiceController@show');
Route::put('/services/{service}', 'App\Http\Controllers\ServiceController@update');
Route::delete('/services/{service}', 'App\Http\Controllers\ServiceController@destroy');

//Rutas para Clientes y Servicios.

Route::post('/clients/services', 'App\Http\Controllers\ClientController@attach');
Route::post('/clients/services/detach', 'App\Http\Controllers\ClientController@detach');

//Para mostrar el numero de clientes que tiene cada servicio
Route::post('/services/clients', 'App\Http\Controllers\ServiceController@clients');
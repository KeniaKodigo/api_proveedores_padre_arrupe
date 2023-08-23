<?php

use App\Http\Controllers\ProveedoresController;
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

Route::get('/', function () {
    return view('welcome');
});
/**
 * IMPORTANTE
 * 
 * LAS RUTAS PARA QUE FUNCIONEN SE AGREGAN EN API.PHP
 * Y EN POSTMAN SE AGREGA API A LA RUTA ASIGNADA PARA QUE FUNCIONE
 */

//Route::get('/proveedores', [ProveedoresController::class, 'index']);

Route::post('/registrar', [ProveedoresController::class, 'store']);
Route::put('/actualizar/{id}', [ProveedoresController::class, 'update']);

Route::delete('/eliminar/{id}', [ProveedoresController::class, 'destroy']);

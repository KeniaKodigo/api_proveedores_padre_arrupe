<?php

use App\Http\Controllers\ProveedoresController;
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
Route::get('/proveedores', [ProveedoresController::class, 'index']);
Route::post('/registrar', [ProveedoresController::class, 'store']);
Route::get('/proveedorById/{id}', [ProveedoresController::class, 'obtenerById']);
Route::put('/actualizar/{id}', [ProveedoresController::class, 'update']);

Route::delete('/eliminar/{id}', [ProveedoresController::class, 'destroy']);

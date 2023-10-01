<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FacultadeController;
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


// Rutas Pruebas

// CRUD FACULTADES
// 1 listar todas las facultades
Route::get('/listaFacultades', [FacultadeController::class, 'listaFacultades'])->name('facultad.listaFacultades'); // lista las facultades
Route::post('/agregarFacultad', [FacultadeController::class, 'agregarFacultad'])->name('facultad.agregarFacultad'); // agregar nuevos datos
Route::put('/editarFacultad/{id_facultad}', [FacultadeController::class, 'editarFacultad'])->name('facultad.editarFacultad'); // actualizar
Route::delete('/eliminarFacultad/{id_facultad}', [FacultadeController::class, 'eliminarFacultad'])->name('facultad.eliminarFacultad'); // eliminar

// PUNTEROS
//agregar una nueva fila
Route::get('/punteroCrearFacultad', [FacultadeController::class, 'punteroCrearFacultad'])->name('facultad.punteroCrearFacultad'); // nos direcciona a una nueva vista para agregar
//editar una fila
Route::get('/punteroEditarFacultad/{id_facultad}', [FacultadeController::class, 'punteroEditarFacultad'])->name('facultad.punteroEditarFacultad');
//Eliminar una Fila
Route::get('/punteroEliminarFacultad/{id_facultad}',[FacultadeController::class, 'punteroEliminarFacultad'])->name('facultad.punteroEliminarFacultad');


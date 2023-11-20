<?php

use App\Http\Controllers\ActividadeController;
use App\Http\Controllers\CargoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FacultadeController; // controlador a utlizar
use App\Http\Controllers\CarreraController; // controlador a utlizar
use App\Http\Controllers\DocenteController; // controlador a utlizar
use App\Http\Controllers\EstudianteController; // controlador a utlizar
use App\Http\Controllers\EventoController; // controlador a utlizar
use App\Http\Controllers\PuntajeController; // controlador a utlizar

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

// RUTAS DE PRUEBAS

// CRUD FACULTADES
// 1 listar todas las facultades
// Route::get('/listaFacultades', [FacultadeController::class, 'listaFacultades'])->name('facultad.listaFacultades'); // lista las facultades
// Route::post('/agregarFacultad', [FacultadeController::class, 'agregarFacultad'])->name('facultad.agregarFacultad'); // agregar nuevos datos
// Route::put('/editarFacultad/{id_facultad}', [FacultadeController::class, 'editarFacultad'])->name('facultad.editarFacultad'); // actualizar
// Route::delete('/eliminarFacultad/{id_facultad}', [FacultadeController::class, 'eliminarFacultad'])->name('facultad.eliminarFacultad'); // eliminar

// // CRUD CARRERAS
// Route::post('/create', [CarreraController::class, 'create'])->name('create'); // crear
// Route::get('/read', [CarreraController::class, 'read'])->name('read'); // leer "mostrar dato"
// Route::put('/update/{id_carrera}', [CarreraController::class, 'update'])->name('update'); // actualizar dato
// Route::delete('/delete/{id_carrerar}',[CarreraController::class, 'delete'])->name('delete'); // Eliminar

// // CRUD DOCENTES
// Route::post('/crearDocente', [DocenteController::class, 'crearDocente'])->name('crearDocente'); // crear
// Route::get('/leerDocente', [DocenteController::class, 'leerDocente'])->name('leerDoncente');// leer
// Route::put('/actualizarDocente/{id_docente}', [DocenteController::class, 'actualizarDocente'])->name('actualizarDocente'); // actualizar
// Route::delete('/eliminarDocente/{id_docente}', [DocenteController::class, 'eliminarDocente'])->name('eliminarDocente'); // eliminar

// // CRUD ESTUDIANTE
// Route::post('/crearEtudiante', [EstudianteController::class, 'crearEtudiante'])->name('crearEtudiante'); // crear
// Route::get('/leerEstudiante', [EstudianteController::class, 'leerEstudiante'])->name('leerEstudiante');// leer
// Route::put('/actualizarEstudiante/{id_estudiante}', [EstudianteController::class, 'actualizarEstudiante'])->name('actualizarEstudiante'); // actualizar
// Route::delete('/eliminarEstudiante/{id_estudiante}', [EstudianteController::class, 'eliminarEstudiante'])->name('eliminarEstudiante'); // eliminar

// //CRUD CARGO
// Route::post('/crearCargo', [CargoController::class, 'crearCargo'])->name('crearCargo'); // crear
// Route::get('/leerCargo', [CargoController::class, 'leerCargo'])->name('leerCargo');// leer
// Route::put('/actualizarCargo/{id_cargo}', [CargoController::class, 'actualizarCargo'])->name('actualizarCargo'); // actualizar
// Route::delete('/eliminarCargo/{id_cargo}', [CargoController::class, 'eliminarCargo'])->name('eliminarCargo'); // eliminar

// //CRUD EVENTOS
// Route::post('/crearEvento', [EventoController::class, 'crearEvento'])->name('crearEvento'); // crear
// Route::get('/leerEvento', [EventoController::class, 'leerEvento'])->name('leerEvento');// leer
// Route::put('/actualizarEvento/{id_evento}', [EventoController::class, 'actualizarEvento'])->name('actualizarEvento'); // actualizar
// Route::delete('/eliminarEvento/{id_evento}', [EventoController::class, 'eliminarEvento'])->name('eliminarEvento'); // eliminar

// //CRUD ACTIVIDADES
// Route::post('/crearActividad', [ActividadeController::class, 'crearActividad'])->name('crearActividad'); // crear
// Route::get('/leerActividad', [ActividadeController::class, 'leerActividad'])->name('leerActividad');// leer
// Route::put('/actualizarActividad/{id_actividad}', [ActividadeController::class, 'actualizarActividad'])->name('actualizarActividad'); // actualizar
// Route::delete('/eliminarActividad/{id_actividad}', [ActividadeController::class, 'eliminarActividad'])->name('eliminarActividad'); // eliminar

// //CRUD PUNTAJES
// Route::post('/crearPuntaje', [PuntajeController::class, 'crearPuntaje'])->name('crearPuntaje'); // crear
// Route::get('/leerPuntaje', [PuntajeController::class, 'leerPuntaje'])->name('leerPuntaje');// leer
// Route::put('/actualizarPuntaje/{id_puntaje}', [PuntajeController::class, 'actualizarPuntaje'])->name('actualizarPuntaje'); // actualizar
// Route::delete('/eliminarPuntaje/{id_puntaje}', [PuntajeController::class, 'eliminarPuntaje'])->name('eliminarPuntaje'); // eliminar


// PUNTEROS
// //agregar una nueva fila
// Route::get('/punteroCrearFacultad', [FacultadeController::class, 'punteroCrearFacultad'])->name('facultad.punteroCrearFacultad'); // nos direcciona a una nueva vista para agregar
// //editar una fila
// Route::get('/punteroEditarFacultad/{id_facultad}', [FacultadeController::class, 'punteroEditarFacultad'])->name('facultad.punteroEditarFacultad');
// //Eliminar una Fila
// Route::get('/punteroEliminarFacultad/{id_facultad}',[FacultadeController::class, 'punteroEliminarFacultad'])->name('facultad.punteroEliminarFacultad');


<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\FacultadeController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ActividadeController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PuntajeController;
use App\Http\Controllers\RoleController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


 // Sistema de Olimpaz
    Route::get('/', function () {return redirect('/lista-Usuarios');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
    // Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
    Route::post('/dashboard', [HomeController::class, 'agregarEstudiante'])->name('home')->middleware('auth'); // ruta de agregar estudiante

    //CRUD Usuarios
    Route::get('/lista-Usuarios', [UserProfileController::class, 'punteroListaUsuario'])->name('usuario.punteroListaUsuario')->middleware('auth');// puntero
    Route::post('/registrar-Usuario', [UserProfileController::class, 'registrarUsuario'])->name('usuario.registrarUsuario')->middleware('auth');// puntero
    Route::get('/editar-Usuario/{id_usuario}', [UserProfileController::class, 'punteroEditarUsuario'])->name('usuario.punteroEditarUsuario')->middleware('auth');
    Route::put('/Actualizar-Usuario/{id_usuario}', [UserProfileController::class, 'actualizarUsuario'])->name('usuario.actualizarUsuario')->middleware('auth');
    Route::get('/eliminar-Usuario/{id_usuario}', [UserProfileController::class, 'punteroEiminar'])->name('usuario.punteroEiminar')->middleware('auth');
    Route::delete('delete-Usuario/{id_usuario}',  [UserProfileController::class, 'eiminarUsuario'])->name('usuario.eiminarUsuario')->middleware('auth');
    Route::get('/asignar-roles/{id_usuario}',[UserProfileController::class, 'punteroAsignarRoles'])->name('usuario.punteroAsignarRoles')->middleware('auth');
    Route::post('/roles/{id_usuario}', [UserProfileController::class, 'asignarRoles'])->name('usuario.asignarRoles')->middleware('auth');

    // CRUD FACULTAD
    Route::get('/lista-Facultad', [FacultadeController::class, 'punteroListaFacultad'])->name('facultad.punteroListaFacultad')->middleware('auth');// puntero
    Route::get('/nueva-Facultad', [FacultadeController::class, 'punteroNuevaFacultad'])->name('facultad.punteroNuevaFacultad')->middleware('auth');//puntero
    Route::post('/agregar-Facultad', [FacultadeController::class, 'agregarFacultad'])->name('facultad.agregarFacultad')->middleware('auth'); // agregar
    Route::get('/Editar-Facultad/{id_facultad}', [FacultadeController::class, 'punteroEditarFacultad'])->name('facultad.punteroEditarFacultad')->middleware('auth');
    Route::put('/Acualizar-Facultad/{id_facultad}', [FacultadeController::class, 'editarFacultad'])->name('facultad.editarFacultad')->middleware('auth'); // actualizar
    Route::get('/eliminar-Facultad/{id_facultad}',[FacultadeController::class, 'punteroEliminarFacultad'])->name('facultad.punteroEliminarFacultad')->middleware('auth'); // puntero
    Route::delete('/delete-Facultad/{id_facultad}', [FacultadeController::class, 'eliminarFacultad'])->name('facultad.eliminarFacultad')->middleware('auth'); // eliminar

    // CRUD ESTUDIANTE
    Route::get('/listaEstudiantes', [EstudianteController::class, 'punteroListaEstudiante'])->name('estudiante.punteroListaEstudiante')->middleware('auth');// puntero
    Route::post('/registrarEstudiante', [EstudianteController::class, 'crearEstudiante'])->name('estudiante.registrarEstudiante')->middleware('auth');
    Route::post('/registrarEstudiantes', [EstudianteController::class, 'crearEstudiante'])->name('estudiante.registrarEstudiante')->middleware('auth');
    Route::put('/actualizarEstudiante/{id_estudiante}', [EstudianteController::class, 'actualizarEstudiante'])->name('estudiante.actualizarEstudiante')->middleware('auth');
    Route::delete('/eliminarEstudiante/{id_estudiante}', [EstudianteController::class, 'eliminarEstudiante'])->name('estudiante.eliminarEstudiante')->middleware('auth');

    //CRUD DE EVENTOS
    Route::get('/ListaEventos', [EventoController::class, 'punteroListaEvento'])->name('eventos.punteroListaEvento')->middleware('auth');
    Route::get('/evento/Registrar-Evento', [EventoController::class, 'punteroRegistroEvento'])->name('eventos.punteroRegistroEvento')->middleware('auth'); // Crear
    Route::post('/evento/Registro-Event', [EventoController::class, 'registrarEvento'])->name('eventos.registrarEvento')->middleware('auth');
    Route::get('/eventos/agregar-actividad/{id_evento}', [EventoController::class, 'punteroagregarActividad'])->name('eventos.agregar-actividad')->middleware('auth');//Agregar Actividad
    Route::post('/eventos/agregar-actividad/{id_evento}', [EventoController::class, 'RegistrarActividad'])->name('eventos.almacenar-actividad')->middleware('auth');
    Route::get('/eventos/Detalles/{id_evento}', [EventoController::class, 'eventoDetalles'])->name('eventos.eventoDetalles')->middleware('auth');// Ver detalls de actividad
    Route::get('/eliminar-Evento/{id_evento}', [EventoController::class, 'punteroEiminarEvento'])->name('eventos.punteroEiminarEvento')->middleware('auth');// Eliminar actividad
    Route::delete('delete-Evento/{id_evento}',  [EventoController::class, 'eliminarEvento'])->name('eventos.eliminarEvento')->middleware('auth');

    // CRUD DE ACTIVIDADES
    Route::get('/ListaActividades', [ActividadeController::class, 'punteroListaActividades'])->name('actividades.punteroListaActividades')->middleware('auth');
    Route::post('/CrearActividades', [ActividadeController::class, 'crearActividad'])->name('actividades.crearActividad')->middleware('auth'); // Crear
    Route::get('/editarActividades/{id_actividad}', [ActividadeController::class, 'punteroEditarActividad'])->name('actividades.punteroEditarActividad')->middleware('auth'); // Editar
    Route::put('/ActualizarActividades/{id_actividad}', [ActividadeController::class, 'actualizarActividad'])->name('actividades.actualizarActividad')->middleware('auth');
    Route::get('/eliminar-Actividad/{id_actividad}',[ActividadeController::class, 'punteroEliminarActividad'])->name('actividades.punteroEliminarActividad')->middleware('auth'); // Eliminar
    Route::delete('/delete-Actividad/{id_actividad}', [ActividadeController::class, 'eliminarActividad'])->name('actividades.eliminarActividad')->middleware('auth');


    // CRUD DE ACTIVIDADES
    Route::get('/Puntaje-Index', [PuntajeController::class, 'indexPuntaje'])->name('puntajes.indexPuntaje');
    Route::post('/Puntaje/Registro-Puntaje', [PuntajeController::class, 'registrarPuntaje'])->name('puntajes.registrarPuntaje')->middleware('auth'); // Agregar Actividad y Puntajes


    Route::get('/Puntajes/agregar-puntaje/{id_actividad}', [PuntajeController::class, 'punteroRegistroPuntaje'])->name('puntajes.agregar-puntaje')->middleware('auth');// Registar estudiantes al equipo
    Route::post('/Puntajes/agregar/{id_actividad}', [PuntajeController::class, 'RegistrarP'])->name('puntajes.almacenar-puntaje')->middleware('auth');


    Route::get('/Puntajes/Detalles/{id_actividad}', [PuntajeController::class, 'detallesPuntaje'])->name('puntajes.Detalles')->middleware('auth');//Ver Detalles del equipo



    Route::get('/eliminar-Puntaje/{id_actividad}', [PuntajeController::class, 'punteroEiminarPuntaje'])->name('puntajes.punteroEiminarPuntaje')->middleware('auth');// Eliminar Equipo
    Route::delete('delete-Puntaje/{id_actividad}',  [PuntajeController::class, 'eliminarPutaje'])->name('puntajes.eliminarPutaje')->middleware('auth');









    //CRUD EQUIPOS
    Route::get('/index-equipos', [EquipoController::class, 'punteroIndexEquipos'])->name('equipos.punteroIndexEquipos')->middleware('auth');// puntero
    Route::get('/equipos/Registrar-Equipo', [EquipoController::class, 'punteroRegistroEquipo'])->name('equipos.punteroRegistroEquipo')->middleware('auth'); // Crear Equipo
    Route::post('/equipos/Registro-Eq', [EquipoController::class, 'registrarEquipo'])->name('equipos.registrarEquipo')->middleware('auth');
    Route::get('/equipos/agregar-estudiante/{id_equipo}', [EquipoController::class, 'punteroRegistroEstdiante'])->name('equipos.agregar-estudiante')->middleware('auth');// Registar estudiantes al equipo
    Route::post('/equipos/agregar-estudiante/{id_equipo}', [EquipoController::class, 'RegistrarEstudiante'])->name('equipos.almacenar-estudiante')->middleware('auth');
    Route::get('/equipos/{equipo}/ver-estudiantes', [EquipoController::class, 'verEstudiantes'])->name('equipos.ver-estudiantes')->middleware('auth');// mostrar los estudiantes que pertenecen a ese equipo
    Route::get('/equipos/Detalles/{id_equipo}', [EquipoController::class, 'detalles'])->name('equipos.Detalles')->middleware('auth');//Ver Detalles del equipo
    Route::get('/eliminar-Equipo/{id_equipo}', [EquipoController::class, 'punteroEiminar'])->name('equipos.punteroEiminar')->middleware('auth');// Eliminar Equipo
    Route::delete('delete-Equipo/{id_equipo}',  [EquipoController::class, 'eliminarEquipo'])->name('equipos.eliminarEquipo')->middleware('auth');

    // Dashboard Reportes
    Route::get('/reportes', [HomeController::class, 'pruebaReportes'])->name('prueba.pruebaReportes');




    // CRUD PROFILE
    Route::group(['middleware' => 'auth'], function () {
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CuentasController;



Route::get('/login', [HomeController::class, 'verLogin'])->name('login');



Route::get('/admin', [AdminController::class, 'adminHome'])->name('admin.home');
Route::get('/artista/{user}', [ArtistaController::class, 'artistaHome'])->name('artista.home');
//Route::get('/artista/{user}', [ArtistaController::class, 'artistaHome'])->name('artista.home');

Route::get('/artista/{user}/publicar', [ArtistaController::class, 'publicar'])->name('artista.publicar');
Route::get('/artista/{user}/baneadas', [ArtistaController::class, 'baneadas'])->name('artista.baneadas');
Route::get('/', [HomeController::class, 'indexHome'])->name('index');
Route::get('/crear', [HomeController::class, 'crearCuenta'])->name('crear.cuenta');

Route::get('/admin/perfiles', [AdminController::class, 'perfiles'])->name('admin.perfiles');
Route::get('/admin/cuentas', [AdminController::class, 'cuentas'])->name('admin.cuentas');
Route::get('/admin/cuentas/{id}/edit', [AdminController::class, 'editCuenta'])->name('admin.cuentas.edit');
//publicar foto
Route::post('/artista/{user}/publicar', [ArtistaController::class, 'subir'])->name('artista.subir');
Route::get('/artista/{user}/cargada', [ArtistaController::class, 'mensaje'])->name('artista.imagencargada');
//login
Route::post('/login',[CuentasController::class,'autenticar'])->name('usuarios.autenticar');
//crear cuenta
Route::post('/crear', [CuentasController::class, 'crearCuenta'])->name('crear.cuenta');
//borrar cuenta
Route::delete('/admin/cuentas/{user}', [AdminController::class, 'borrarCuenta'])->name('admin.borrar');
//actualizar cuenta
Route::get('/admin/editar/{user}', [AdminController::class, 'editar'])->name('admin.editar');
Route::put('/admin/cuentas/{user}', [AdminController::class, 'actualizar'])->name('admin.actualizar');

//baneo y comentario
Route::post('/artista/banear/{id}', [AdminController::class, 'banear'])->name('artista.banear');
//borrar foto
Route::delete('/artista/eliminar/{id}', [ArtistaController::class, 'eliminar'])->name('artista.eliminar');
//editar nombre foto
Route::post('/artista/editar/{id}', [ArtistaController::class, 'editar'])->name('artista.editar');
//logout
Route::get('/cuenta/logout',[CuentasController::class,'logout'])->name('cuentas.logout');
//listado artistas
Route::get('/artista/listado', [ArtistaController::class, 'listado'])->name('artista.listado');

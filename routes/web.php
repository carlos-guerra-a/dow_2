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
Route::get('/artista/{user}', [ArtistaController::class, 'artistaHome'])->name('artista.home');


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


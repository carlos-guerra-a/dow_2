<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\HomeController;



Route::get('/login', [HomeController::class, 'verLogin'])->name('login');
Route::get('/admin', [AdminController::class, 'adminHome'])->name('admin.home');
Route::get('/artista', [ArtistaController::class, 'artistaHome'])->name('artista.home');
Route::get('/artista/publicar', [ArtistaController::class, 'publicar'])->name('artista.publicar');
Route::get('/artista/baneadas', [ArtistaController::class, 'baneadas'])->name('artista.baneadas');
Route::get('/', [HomeController::class, 'indexHome'])->name('index');
Route::get('/crear', [HomeController::class, 'crearCuenta'])->name('crear.cuenta');
;


Route::get('/admin/perfiles', [AdminController::class, 'perfiles'])->name('admin.perfiles');
Route::get('/admin/cuentas', [AdminController::class, 'cuentas'])->name('admin.cuentas');
//Route::get('/admin/cuentas/{id}/edit', [AdminController::class, 'editCuenta'])->name('admin.cuentas.edit');

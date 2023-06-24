<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\PublicoController;



Route::get('/', [AuthController::class, 'verLogin']);
Route::get('/admin',[AdminController::class, 'adminHome']);
Route::get('/artista',[ArtistaController::class, 'artistaHome']);
Route::get('/publico',[PublicoController::class, 'publicoHome']);

Route::get('/admin/perfiles', [AdminController::class, 'perfiles'])->name('admin.perfiles');
Route::get('/admin/cuentas', [AdminController::class, 'cuentas'])->name('admin.cuentas');
//Route::get('/admin/cuentas/{id}/edit', [AdminController::class, 'editCuenta'])->name('admin.cuentas.edit');

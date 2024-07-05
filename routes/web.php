<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ArticuloController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/empleados', [EmpleadoController::class, 'index'])->name('empleados.index');
// Route::get('/empleados/create', [EmpleadoController::class, 'create'])->name('empleados.create');
// Route::post('/empleados', [EmpleadoController::class, 'store'])->name('empleados.store');
// Route::get('/empleados/{empleado}', [EmpleadoController::class, 'show'])->name('empleados.show');
// Route::get('/empleados/{empleado}/edit', [EmpleadoController::class, 'edit'])->name('empleados.edit');
// Route::put('/empleados/{empleado}', [EmpleadoController::class, 'update'])->name('empleados.update');
// Route::delete('/empleados/{empleado}', [EmpleadoController::class, 'destroy'])->name('empleados.destroy');

// Route::get('/articulos', [ArticuloController::class, 'index'])->name('articulos.index');
// Route::get('/articulos/create', [ArticuloController::class, 'create'])->name('articulos.create');
// Route::post('/articulos', [ArticuloController::class, 'store'])->name('articulos.store');
// Route::get('/articulos/{articulo}', [ArticuloController::class, 'show'])->name('articulos.show');
// Route::get('/articulos/{articulo}/edit', [ArticuloController::class, 'edit'])->name('articulos.edit');
// Route::put('/articulos/{articulo}', [ArticuloController::class, 'update'])->name('articulos.update');
// Route::delete('/articulos/{articulo}', [ArticuloController::class, 'destroy'])->name('articulos.destroy');


Route::resource('empleados', EmpleadoController::class);
Route::resource('articulos', ArticuloController::class);
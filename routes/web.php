<?php

use Illuminate\Support\Facades\Route;

Route:: group(["middleware" => "web"], function() {
    Route:: get("/", [App\Http\Controllers\HomeController::class, 'index']);
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
});

Route::get('/usuarios_list', [App\Http\Controllers\UsuariosController::class, 'index'])->middleware('auth');
Route::get('/usuarios/new', [App\Http\Controllers\UsuariosController::class, 'registrar'])->middleware('auth');
Route::post('/usuarios/add', [App\Http\Controllers\UsuariosController::class, 'add'])->middleware('auth');
Route::get('/usuarios/{id}/edit', [App\Http\Controllers\UsuariosController::class, 'edit'])->middleware('auth');
Route::post('/usuarios/update/{id}', [App\Http\Controllers\UsuariosController::class, 'update'])->middleware('auth');
Route::delete('/usuarios/delete/{id}', [App\Http\Controllers\UsuariosController::class, 'delete'])->middleware('auth');

Route::get('/usuarios/export/', [App\Http\Controllers\UsuariosController::class, 'export'])->name("excel");
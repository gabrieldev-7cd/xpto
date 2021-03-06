<?php

use Illuminate\Support\Facades\Route;

Route:: group(["middleware" => "web"], function() {
    Route:: get("/", [App\Http\Controllers\HomeController::class, 'index']);
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
});

Route::get('/usuarios_list', [App\Http\Controllers\UsuariosController::class, 'index']);
Route::get('/usuarios/new', [App\Http\Controllers\UsuariosController::class, 'registrar']);
Route::post('/usuarios/add', [App\Http\Controllers\UsuariosController::class, 'add']);
Route::get('/usuarios/{id}/edit', [App\Http\Controllers\UsuariosController::class, 'edit']);
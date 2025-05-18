<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Auth;

//rutas publicas
Route::get('/login', [UsuariosController::class, 'mostrarLogin'])->name('login'); //ruta mostrar el form de login
Route::post('/login', [UsuariosController::class, 'login'])->name('login.post'); //ruta validar login

//rutas privadas
Route::middleware('auth')->group(function () {
    Route::get('/inicio', [UsuariosController::class, 'inicio'])->name('inicio'); //ruta que abre el inicio solo si se inicia sesion
    Route::post('/logout', [UsuariosController::class, 'logout'])->name('logout'); //ruta de logout solo para usuario que han iniciado sesion
});

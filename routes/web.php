<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EmpresaController;
use Illuminate\Support\Facades\Auth;


//rutas publicas
Route::get('/login', [UsuariosController::class, 'mostrarLogin'])->name('login'); //ruta mostrar el form de login
Route::post('/login', [UsuariosController::class, 'login'])->name('login.post'); //ruta validar login

//rutas privadas
Route::middleware('auth')->group(function () {
    Route::get('/inicio', [UsuariosController::class, 'inicio'])->name('inicio'); //ruta que abre el inicio solo si se inicia sesion
    Route::post('/logout', [UsuariosController::class, 'logout'])->name('logout'); //ruta de logout solo para usuario que han iniciado sesion
});

 Route::middleware(['auth', 'admin.cuponera'])->group(function () {
    Route::get('/empresas', [EmpresaController::class, 'listar'])->name('empresas.lista');
    Route::get('/empresas/registrar', [EmpresaController::class, 'mostrarFormulario'])->name('empresas.nueva');
    Route::post('/empresas/registrar', [EmpresaController::class, 'registrar'])->name('empresas.registrar');
    Route::get('/empresas/{id}/editar', [EmpresaController::class, 'editar'])->name('empresas.editar');
Route::put('/empresas/{id}', [EmpresaController::class, 'actualizar'])->name('empresas.actualizar');
Route::delete('/empresas/{id}', [EmpresaController::class, 'eliminar'])->name('empresas.eliminar');
});

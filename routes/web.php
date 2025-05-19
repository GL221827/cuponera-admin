<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\OfertasController;
use Illuminate\Support\Facades\Auth;


//rutas publicas
Route::get('/login', [UsuariosController::class, 'mostrarLogin'])->name('login'); //ruta mostrar el form de login
Route::post('/login', [UsuariosController::class, 'login'])->name('login.post'); //ruta validar login

// Recuperación de contraseña (usuarios no autenticados)
Route::get('/usuarios/recuperar-password', [UsuariosController::class, 'requestPassword'])->name('usuarios.password-request');
Route::post('/usuarios/enviar-password', [UsuariosController::class, 'sendPassword'])->name('usuarios.password-email');

//rutas privadas para usuarios autenticados
Route::middleware('auth')->group(function () {
    Route::get('/inicio', [UsuariosController::class, 'inicio'])->name('inicio'); //ruta que abre el inicio solo si se inicia sesion
    Route::post('/logout', [UsuariosController::class, 'logout'])->name('logout'); //ruta de logout solo para usuario que han iniciado sesion
    
    // Cambio de contraseña para usuarios autenticados
    Route::get('/usuarios/cambiar-password', [UsuariosController::class, 'changePassword'])->name('usuarios.change-password');
    Route::post('/usuarios/actualizar-password', [UsuariosController::class, 'updatePassword'])->name('usuarios.update-password');
});

//menu para ver el menu de empresa del admin
 Route::middleware(['auth', 'admin.cuponera'])->group(function () {
    Route::get('/empresas', [EmpresaController::class, 'listar'])->name('empresas.lista');
    Route::get('/empresas/registrar', [EmpresaController::class, 'mostrarFormulario'])->name('empresas.nueva');
    Route::post('/empresas/registrar', [EmpresaController::class, 'registrar'])->name('empresas.registrar');
    Route::get('/empresas/{id}/editar', [EmpresaController::class, 'editar'])->name('empresas.editar');
    Route::put('/empresas/{id}', [EmpresaController::class, 'actualizar'])->name('empresas.actualizar');
    Route::delete('/empresas/{id}', [EmpresaController::class, 'eliminar'])->name('empresas.eliminar');
});

//rutas para ver el menu de ofertas
Route::middleware(['auth', 'admin.cuponera'])->group(function () {
    Route::get('/solicitudes-ofertas', [OfertasController::class, 'verSolicitudes'])->name('ofertas.solicitudes');
    Route::post('/oferta/aprobar/{id}', [OfertasController::class, 'aprobar'])->name('oferta.aprobar');
    Route::post('/oferta/rechazar/{id}', [OfertasController::class, 'rechazar'])->name('oferta.rechazar');
    Route::post('/oferta/descartar/{id}', [OfertasController::class, 'descartar'])->name('oferta.descartar');
    Route::get('/ofertas', [OfertasController::class, 'ListarOfertas'])->name('ofertas.lista');
});

Route::middleware(['auth', 'admin.empresa'])->group(function () {
    Route::get('/nueva-oferta', [OfertasController::class, 'nuevaOferta'])->name('oferta.nueva');
    Route::post('/oferta/guardar', [OfertasController::class, 'guardarOferta'])->name('oferta.guardar');
    Route::get('/lista-oferta', [OfertasController::class, 'verOfertas'])->name('oferta.verOferta');
    Route::get('/', function () {
        return view('layouts.menu-emp'); // O la vista principal de tu app
    })->name('home');
});
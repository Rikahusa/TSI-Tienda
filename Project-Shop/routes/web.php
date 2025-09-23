<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController; //TESTEANDO
use App\Http\Controllers\AuthController; //TESTEANDO

Route::get('/login', function () {
    return view('login.index');
})->name('login');

Route::get('/productos', function () {
    return view('Productos.index');
});

Route::get('/carrito', function () {
    return view('Carrito.index');
});

Route::get('/', function () {
    return view('inicio.index');
});

Route::get('/Catalogo_Amigurumi', function () {
    return view('Catalogo_Amigu.index');
});

Route::get('/Catalogo_Fiestas', function () {
    return view('Catalogo_Fiesta.index');
});

Route::get('/Catalogo_Vesti&Acceso', function () {
    return view('Catalogo_Ves&Acce.index');
});

//Route::get('/registro', function () {
//    return view('registro.index');
//});

//ZONA DE TESTEO

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// Ruta para mostrar el formulario
Route::get('/registro', [UsuarioController::class, 'create'])->name('registro.create');

// Ruta para procesar el formulario
Route::post('/registro', [UsuarioController::class, 'store'])->name('registro.store');



// Rutas de autenticación

<?php

use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AjusteStockController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;

// ✅ Ajuste de productos
Route::get('/ajustes', [ProductoController::class,'index'])->name('ajustes.index');
Route::post('/ajustes/guardar', [ProductoController::class,'store'])->name('ajustes.guardar');
Route::put('/ajustes/{id}/actualizar', [ProductoController::class,'update'])->name('ajustes.actualizar');
Route::delete('/ajustes/{id}/eliminar', [ProductoController::class,'destroy'])->name('ajustes.eliminar');

// ✅ Login
Route::get('/login', function () {
    return view('login.index');
})->name('login');

// ✅ Página de productos destacados
Route::get('/productos', function () {
    return view('Productos.index');
})->name('productos.index');

// ✅ Inicio (vista después de login)
Route::get('/inicio', function () {
    return view('inicio.index');
})->name('inicio.index');

// ✅ Redirección principal
Route::get('/', function () {
    // 🔑 Si hay sesión, ir a inicio; si no, ir a login
    return session()->has('usuario')
        ? redirect()->route('inicio.index')
        : redirect()->route('login');
});

// ✅ Catálogos dinámicos
Route::get('/catalogo/vestidos', [CatalogoController::class, 'index'])
    ->defaults('tipo', 'vestidos')->name('catalogo.vestidos');
Route::get('/catalogo/fiesta', [CatalogoController::class, 'index'])
    ->defaults('tipo', 'fiesta')->name('catalogo.fiesta');
Route::get('/catalogo/amigu', [CatalogoController::class, 'index'])
    ->defaults('tipo', 'amigurumis')->name('catalogo.amigurumis');

// ✅ Carrito
Route::get('/carrito', [CarritoController::class, 'mostrar'])->name('carrito.mostrar');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');

// ✅ Usuarios
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/registro', [UsuarioController::class, 'create'])->name('registro.create');
Route::post('/registro', [UsuarioController::class, 'store'])->name('registro.store');

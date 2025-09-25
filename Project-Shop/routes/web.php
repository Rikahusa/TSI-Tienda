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

//Route::get('/carrito', function () {
//    return view('Carrito.index');
//  });

Route::get('/', function () {
    return view('inicio.index');
});

// Rutas para los catálogos
Route::get('/catalogo/vestidos', function () {
    return view('Catalogo_Vestidos.index');
});

Route::get('/catalogo/amigu', function () {
    return view('Catalogo_Amigu.index');
});

Route::get('/catalogo/fiesta', function () {
    return view('Catalogo_Fiesta.index');
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






// ✅ ESTO SÍ DEBE ESTAR:
Route::get('/carrito', [App\Http\Controllers\CarritoController::class, 'mostrar'])->name('carrito.mostrar');
// Rutas del carrito
Route::post('/carrito/agregar/{id}', [App\Http\Controllers\CarritoController::class, 'agregar'])->name('carrito.agregar');
//Route::get('/carrito', [App\Http\Controllers\CarritoController::class, 'mostrar'])->name('carrito.mostrar');
Route::delete('/carrito/eliminar/{id}', [App\Http\Controllers\CarritoController::class, 'eliminar'])->name('carrito.eliminar');





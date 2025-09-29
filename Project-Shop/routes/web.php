<?php

use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;

/*
|--------------------------------------------------------------------------
|  Rutas protegidas SOLO para Admin (verificación manual)
|--------------------------------------------------------------------------
*/
Route::group([], function () {
    //  Verificación de ADMIN en cada ruta de ajustes
    $verificarAdmin = function () {
        if (!session()->has('usuario') || session('usuario.rol') !== 'Admin') {
            abort(403, 'Acceso denegado.');
        }
    };

    Route::get('/ajustes', function () use ($verificarAdmin) {
        $verificarAdmin();
        return app(ProductoController::class)->index();
    })->name('ajustes.index');

    Route::post('/ajustes/guardar', function () use ($verificarAdmin) {
        $verificarAdmin();
        return app(ProductoController::class)->store(request());
    })->name('ajustes.guardar');

    Route::put('/ajustes/{id}/actualizar', function ($id) use ($verificarAdmin) {
        $verificarAdmin();
        return app(ProductoController::class)->update(request(), $id);
    })->name('ajustes.actualizar');

    Route::delete('/ajustes/{id}/eliminar', function ($id) use ($verificarAdmin) {
        $verificarAdmin();
        return app(ProductoController::class)->destroy($id);
    })->name('ajustes.eliminar');
});

/*
|--------------------------------------------------------------------------
|  Login y Usuarios
|--------------------------------------------------------------------------
*/
Route::get('/login', function () {
    return view('login.index');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/registro', [UsuarioController::class, 'create'])->name('registro.create');
Route::post('/registro', [UsuarioController::class, 'store'])->name('registro.store');

/*
|--------------------------------------------------------------------------
| Productos y Carrito
|--------------------------------------------------------------------------
*/
Route::get('/productos', function () {
    return view('Productos.index');
})->name('productos.index');

Route::get('/carrito', [CarritoController::class, 'mostrar'])->name('carrito.mostrar');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');

/*
|--------------------------------------------------------------------------
| Inicio y Catálogos
|--------------------------------------------------------------------------
*/
Route::get('/inicio', function () {
    return view('inicio.index');
})->name('inicio.index');

/*
|--------------------------------------------------------------------------
|  Página principal SIEMPRE → Login
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/catalogo/vestidos', [CatalogoController::class, 'index'])
    ->defaults('tipo', 'vestidos')->name('catalogo.vestidos');

Route::get('/catalogo/fiesta', [CatalogoController::class, 'index'])
    ->defaults('tipo', 'fiesta')->name('catalogo.fiesta');

Route::get('/catalogo/amigu', [CatalogoController::class, 'index'])
    ->defaults('tipo', 'amigurumis')->name('catalogo.amigurumis');

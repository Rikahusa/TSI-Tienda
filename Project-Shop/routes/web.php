<?php

use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\VentasController;

/*
|--------------------------------------------------------------------------
| Middleware manual para verificar Admin
|--------------------------------------------------------------------------
*/
$verificarAdmin = function () {
    if (!session()->has('usuario') || session('usuario.rol') !== 'Admin') {
        abort(403, 'Acceso denegado.');
    }
};

/*
|--------------------------------------------------------------------------
| AJUSTES ---PROTEGIDO--- SOLO ADMIN
|--------------------------------------------------------------------------
*/
Route::group([], function () use ($verificarAdmin) {

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
| LOGIN Y USUARIOS
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
| PRODUCTOS Y CARRITO
|--------------------------------------------------------------------------
*/
Route::get('/productos', function () {
    return view('Productos.index');
})->name('productos.index');

Route::get('/carrito', [CarritoController::class, 'mostrar'])->name('carrito.mostrar');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::put('/carrito/actualizar/{id}', [CarritoController::class, 'actualizar'])->name('carrito.actualizar');

/*
|--------------------------------------------------------------------------
| PAGOS Y CONFIRMACIONES ---PROTEGIDO--- SOLO ADMIN para confirmaciones internas
|--------------------------------------------------------------------------
*/

// Página normal de pagos (disponible para usuarios)
Route::get('/pagos', [CarritoController::class, 'mostrarPago'])->name('pagos.index');

// Confirmar pedido (usuario)
Route::post('/ventas/confirmar', [VentasController::class, 'confirmarPedido'])->name('ventas.confirmar');

// Confirmación de ventas – ADMIN
Route::get('/ventas/confirmacion/{num_venta}', function ($num_venta) use ($verificarAdmin) {
    $verificarAdmin();
    return app(VentasController::class)->confirmacion($num_venta);
})->name('pagos.confirmacion');

// Concretar o cancelar venta – ADMIN
Route::post('/ventas/concretar/{num_venta}', function ($num_venta) use ($verificarAdmin) {
    $verificarAdmin();
    return app(VentasController::class)->concretarVenta($num_venta);
})->name('ventas.concretar');

Route::post('/ventas/cancelar/{num_venta}', function ($num_venta) use ($verificarAdmin) {
    $verificarAdmin();
    return app(VentasController::class)->cancelarVenta($num_venta);
})->name('ventas.cancelar');

/*
|--------------------------------------------------------------------------
| INICIO Y CATÁLOGOS
|--------------------------------------------------------------------------
*/
Route::get('/inicio', function () {
    return view('inicio.index');
})->name('inicio.index');

Route::get('/catalogo/vestidos', [CatalogoController::class, 'index'])
    ->defaults('tipo', 'vestidos')->name('catalogo.vestidos');

Route::get('/catalogo/fiesta', [CatalogoController::class, 'index'])
    ->defaults('tipo', 'fiesta')->name('catalogo.fiesta');

Route::get('/catalogo/amigu', [CatalogoController::class, 'index'])
    ->defaults('tipo', 'amigurumis')->name('catalogo.amigurumis');

/*
|--------------------------------------------------------------------------
| STOCK ---PROTEGIDO--- SOLO ADMIN
|--------------------------------------------------------------------------
*/
Route::get('/stock', function () use ($verificarAdmin) {
    $verificarAdmin();
    return app(StockController::class)->index();
})->name('stock.index');

Route::put('/stock/{id}', function ($id) use ($verificarAdmin) {
    $verificarAdmin();
    return app(StockController::class)->update(request(), $id);
})->name('stock.actualizar');

/*
|--------------------------------------------------------------------------
| DETALLE DE VENTA ---PROTEGIDO--- SOLO ADMIN
|--------------------------------------------------------------------------
*/
Route::get('/detalle_venta', function () use ($verificarAdmin) {
    $verificarAdmin();
    return view('detalle_venta.index');
})->name('detalle.index');

/*
|--------------------------------------------------------------------------
| ROOT → LOGIN
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login');
});




Route::get('/pedido/confirmacion/{num_venta}', 
    [VentasController::class, 'confirmacionUsuario'])
    ->name('pedido.confirmacion');




Route::get('/pedido/historial', 
    [VentasController::class, 'historialUsuario'])
    ->name('pedido.historial');

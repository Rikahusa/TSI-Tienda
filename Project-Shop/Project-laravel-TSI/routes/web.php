<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login.index');
});

Route::get('/productos', function () {
    return view('Productos.index');
});

Route::get('/carrito', function () {
    return view('Carrito.index');
});

Route::get('/registro', function () {
    return view('registro.index');
});

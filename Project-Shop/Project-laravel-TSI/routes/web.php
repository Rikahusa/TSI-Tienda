<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.welcome');
});

Route::get('/productos', function () {
    return view('Productos.index');
});

Route::get('/carrito', function () {
    return view('Carrito.index');
});

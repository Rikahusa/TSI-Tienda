<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('Home.index');
});

Route::get('/productos', function () {
    return view('Productos.index');
});

Route::get('/carrito', function () {
    return view('Carrito.index');
});

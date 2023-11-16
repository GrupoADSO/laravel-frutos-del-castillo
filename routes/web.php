<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/productos', function () {
    return view('paginas.productos');
});

Route::get('/sobre_mi', function () {
    return view('paginas.sobre_nosotros');
});

Route::get('/contactanos', function () {
    return view('paginas.contactanos');
});

Route::get('/perfil', function () {
    return view('paginas.perfil_usuario');
});

Route::get('/factura', function () {
    return view('paginas.factura');
});

Route::get('/informacion_legal', function () {
    return view('paginas.informacion_legal');
});



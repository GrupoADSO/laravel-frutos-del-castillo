<?php

use App\Http\Controllers\login\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
})->name('inicio');

Route::get('/productos', function () {
    return view('paginas.productos');
})->name('productos');;

Route::get('/sobre_mi', function () {
    return view('paginas.sobre_nosotros');
})->name('sobreMi');;

Route::get('/contactanos', function () {
    return view('paginas.contactanos');
})->name('contactanos');;

Route::get('/perfil', function () {
    return view('paginas.perfil_usuario');
})->name('perfil');;

Route::get('/factura', function () {
    return view('paginas.factura');
})->name('factura');;

Route::get('/informacion_legal', function () {
    return view('paginas.informacion_legal');
})->name('informacionLegal');;



// RUTAS PARA EL LOGIN
Route::post('/login/crear/usuario', [LoginController::class, 'crearUsuario'])->name('crearUsuario');
Route::post('Login/sesion', [LoginController::class, 'iniciarSesion'])->name('iniciarSesion');
Route::get('Login/cerrarSesion', [LoginController::class, 'finalizarSesionUsuario'])->name('cerrarSesion');




<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\login\LoginController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;



// RUTAS PARA EL LOGIN
Route::post('Login/sesion', [LoginController::class, 'iniciarSesion'])->name('iniciarSesion');
Route::post('/login/crear/usuario', [LoginController::class, 'crearUsuario'])->name('crearUsuario');
Route::get('Login/cerrarSesion', [LoginController::class, 'finalizarSesionUsuario'])->name('cerrarSesion');

// controla las imagenes de la categoria/slider
Route::get('/', [HomeController::class, 'index'])->name('inicio');


// Rutas para los productos
Route::get('/productos',[ProductoController::class,'index'])->name('producto');

// RUTAS PARA MANEJAR EL MENÚ
// trae las subcategorias de la categoria principal
Route::get('/categorias', [CategoriaController::class, 'obtenerCategorias']);


Route::get('/productos/{categoria}', [ProductoController::class, 'obtenerProductosDeCategoria']);







// temporales
// Route::get('/productos', function () {
//     return view('paginas.productos');
// })->name('productos');;

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

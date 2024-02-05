<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\login\LoginController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UsuariosController;
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







// temporales-admin

Route::get('/admin', [HomeController::class, 'datosDashboard'])->name('inicio-admin');


Route::get("admin-categorias",[CategoriaController::class, 'index'])->name('categorias');
Route::get("admin-categorias/crear",[CategoriaController::class, 'create'])->name('crear-categoria');
Route::post("admin-categorias/crear",[CategoriaController::class, 'store'])->name('categoria.store');

Route::get("/usuarios",[UsuariosController::class, 'index'])->name('usuarios');


Route::get('/admin-productos', [ProductoController::class, 'mostrarProductos'])->name('productos');
Route::get('/admin-productos/crear', [ProductoController::class, 'create'])->name('crear-productos');
Route::get('/admin-productos/editar', [ProductoController::class, 'edit'])->name('editar-productos');

Route::get('/admin-slider', [SliderController::class, 'index'])->name('slider');
Route::get('/admin-slider/crear', [SliderController::class, 'create'])->name('crear-slider');

// crear las rutas para las demas vistas faltantes 


// agregar los controladores de estas rutas
Route::get('/sobre_mi', function () {
    return view('paginas.sobre_nosotros');
})->name('sobreMi');


Route::get('/perfil', function () {
    return view('paginas.perfil_usuario');
})->name('perfil');


Route::get('/factura', function () {
    return view('paginas.factura');
})->name('factura');



Route::get('/informacion_legal', function () {
    return view('paginas.informacion_legal');
})->name('informacionLegal');

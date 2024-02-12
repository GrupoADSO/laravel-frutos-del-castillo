<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FacturaController;
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

Route::get('perfil-usuario/{id}', [UsuariosController::class, 'index'])->name('perfil');
// Rutas para los productos
Route::get('/productos', [ProductoController::class, 'index'])->name('producto');

// RUTAS PARA MANEJAR EL MENÚ
// trae las subcategorias de la categoria principal
Route::get('/categorias', [CategoriaController::class, 'obtenerCategorias']);


Route::get('/productos/{categoria}', [ProductoController::class, 'obtenerProductosDeCategoria']);


Route::get('/factura',[FacturaController::class, 'index'])->name('factura');






// ruta admin principal
Route::controller(HomeController::class)->group(function () {
    Route::get('/admin', 'datosDashboard')->name('inicio-admin');
});

//ruta de las categorias
Route::controller(CategoriaController::class)->group(function () {
    Route::get("admin-categorias", 'index')->name('categorias');
    Route::get("admin-categorias/crear", 'create')->name('crear-categoria');
    Route::post("admin-categorias/crear", 'store')->name('categoria.store');
    Route::get("admin-categorias/editar/{idcategoria}", 'edit')->name('editar-categoria');
    Route::post("admin-categorias/actualizar/{idcategoria}", 'update')->name('update-categoria');
    Route::delete("admin-categorias/eliminar/{idcategoria}", [CategoriaController::class, 'destroy'])->name('eliminar-categoria');
});


Route::get("/usuarios", [UsuariosController::class, 'index'])->name('usuarios');



Route::controller(ProductoController::class)->group(function () {
    Route::get('/admin-productos', 'mostrarProductos')->name('productos');
    Route::get('/admin-productos/crear', 'create')->name('crear-productos');
    Route::post('/admin-productos/crear/nuevos', 'store')->name('nuevo-producto');
    Route::get('/admin-productos/editar-producto/{idproducto}','edit')->name('editar-producto');
    Route::post('/admin-productos/actualizar-producto/{idproducto}','update')->name('update-producto');
    Route::delete('/admin-productos/eliminar-producto/{idproducto}','destroy')->name('eliminar-producto');

});



Route::controller(SliderController::class)->group(function () {
    Route::get('/admin-slider', 'index')->name('slider');
    Route::get('/admin-slider/crear', 'create')->name('crear-slider');
    Route::post('/admin-slider/nuevo-slider', 'store')->name('nuevo-slider');
    Route::get('/admin-slider/editar/{idSlider}', 'edit')->name('editar-slider');
    Route::post('/admin-slider/editar-slider/{idSlider}', 'update')->name('actualizar-slider');

    Route::delete('/admin-slider/eliminar/{idSlider}', 'destroy')->name('eliminar-slider');
});


// crear las rutas para las demas vistas faltantes


// agregar los controladores de estas rutas
Route::get('/sobre_mi', function () {
    return view('paginas.sobre_nosotros');
})->name('sobreMi');






Route::get('/informacion_legal', function () {
    return view('paginas.informacion_legal');
})->name('informacionLegal');

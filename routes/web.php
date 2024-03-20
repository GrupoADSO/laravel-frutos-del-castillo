<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\login\LoginController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;
use PhpOffice\PhpPresentation\Shape\Table\Row;

// RUTAS PARA EL LOGIN
Route::post('Login/sesion', [LoginController::class, 'iniciarSesion'])->name('login');
Route::post('/login/crear/usuario', [LoginController::class, 'crearUsuario'])->name('crearUsuario');
Route::get('Login/cerrarSesion', [LoginController::class, 'finalizarSesionUsuario'])->name('cerrarSesion');


// controla las imagenes de la categoria/slider
Route::get('/', [HomeController::class, 'index'])->name('inicio');




Route::controller(UsuariosController::class)->group(function () {
    Route::get('perfil-usuario/{id}', 'index')->name('perfil');
    Route::post('perfil-usuario/editar/{id}', 'store')->name('editar-perfil');

});




// Rutas para los productos
Route::get('/productos', [ProductoController::class, 'index'])->name('producto');

Route::get('/categorias', [CategoriaController::class, 'obtenerCategorias']);

Route::get('/factura',[FacturaController::class, 'index'])->name('factura');

// ruta admin principal
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin', 'index')->name('inicio-admin');
    Route::get('perfil', 'edit')->name('perfil-admin');
    Route::post('perfil-actualizar/{id}', 'update')->name('perfil-admin-actualizar');
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


Route::controller(UsuariosController::class)->group(function () {
Route::get("/usuarios/editar/{id}", 'edit')->name('usuarios-editar');
Route::post("/usuarios/update/{id}", 'update')->name('usuarios-actualizar');
Route::delete("/usuarios/eliminar/{id}", 'destroy')->name('usuarios-eliminar');
});


Route::controller(ProductoController::class)->group(function () {
    Route::get('/admin-productos', 'mostrarProductos')->name('admin-productos');
    Route::get('/admin-productos/crear', 'create')->name('crear-productos');
    Route::post('/admin-productos/crear/nuevos', 'store')->name('nuevo-producto');
    Route::get('/admin-productos/editar-producto/{idproducto}','edit')->name('editar-producto');
    Route::post('/admin-productos/actualizar-producto/{idproducto}','update')->name('update-producto');
    Route::delete('/admin-productos/eliminar-producto/{idproducto}','destroy')->name('eliminar-producto');

});


Route::controller(PedidosController::class)->group(function (){
    Route::get('/pedidos', 'mostrarPedidos')->name('mostrar-pedidos');
    Route::get('/pedidos/gestion/{compraId}', 'gestionarPedido')->name('gestionar-pedido');
    Route::post('/cambiarEstadoPedidoGestionado/{compraId}', 'pedidoGestionado')->name('pedido-gestionado');
    Route::post('/cambiarEstadoPedidoCancelado/{compraId}', 'pedidoCancelado')->name('pedido-cancelado');
});


Route::controller(SliderController::class)->group(function () {
    Route::get('/admin-slider', 'index')->name('slider');
    Route::get('/admin-slider/crear', 'create')->name('crear-slider');
    Route::post('/admin-slider/nuevo-slider', 'store')->name('nuevo-slider');
    Route::get('/admin-slider/editar/{idSlider}', 'edit')->name('editar-slider');
    Route::post('/admin-slider/editar-slider/{idSlider}', 'update')->name('actualizar-slider');

    Route::delete('/admin-slider/eliminar/{idSlider}', 'destroy')->name('eliminar-slider');
});


Route::get('/sobre_mi', function () {
    return view('paginas.sobre_nosotros');
})->name('sobreMi');

Route::get('/informacion_legal', function () {
    return view('paginas.informacion_legal');
})->name('informacionLegal');

//paypal rutas
Route::post('paypal/pago', [PaypalController::class, 'pago' ])->name('paypal');
Route::get('paypal/success', [PaypalController::class, 'success' ])->name('paypal_success') ;
Route::post('/pago/{valor}', [PaypalController::class, 'recibirPago' ]);
Route::post('/factura/{productos}', [PaypalController::class, 'recibirFactura' ]);
Route::get('detalle_factura/pdf', [PaypalController::class,'generatePDF' ])->name('paginas.detalle_factura_pdf');
Route::get('paypal/cancel', [PaypalController::class, 'cancel' ])->name('paypal_cancel') ;
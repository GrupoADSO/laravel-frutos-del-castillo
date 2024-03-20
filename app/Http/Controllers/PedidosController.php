<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\User;
use App\Models\Factura;
use App\Models\Producto;

class PedidosController extends Controller {

    // Mostrar los pedidos con estado 1
    public function mostrarPedidos() {

        // Obtener todas las compras con estado 1 y sus usuarios asociados
        $compras = Compra::with('usuario')->where('estado', 1)->orWhere('estado', 0)->get();

        // Retornar los datos
        return view('admin.pedidos', compact('compras'));
    }

    // Gestionar pedido: obtener información de la factura y sus productos asociados
    public function gestionarPedido($compraId) {

        // Obtener la compra y su usuario asociado
        $compra = Compra::with('usuario')->findOrFail($compraId);
        
        // Obtener la factura asociada a la compra y los productos asociados a la factura
        $factura = Factura::where('compra_id', $compraId)->get();

        // Obtener id de la compra
        $cambiarEstado = $compraId;

        // Pasar la compra, usuario y factura a la vista
        return view('admin.gestionar-pedido', compact('compra', 'factura', 'cambiarEstado'));

    }

    public function pedidoGestionado($compraId){

        // Se busca la compra por el Id
        $compra = Compra::findOrFail($compraId);

        // Se cambia el estado de la compra a 0 (para pedidos gestionados)
        $compra->estado = 0;

        $compra->save();

        return redirect()->route('mostrar-pedidos');

    }

    public function pedidoCancelado($compraId){

        // Se busca la compra por el Id
        $compra = Compra::findOrFail($compraId);

        // Se cambia el estado de la compra a 2 (para pedidos cancelados)
        $compra->estado = 2;

        $compra->save();

        return redirect()->route('mostrar-pedidos');

    }
}
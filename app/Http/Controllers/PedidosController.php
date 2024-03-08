<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\User;
use App\Models\Factura;

class PedidosController extends Controller {

    // Función para mostrar los pedidos con estado 0
    public function mostrarPedidos() {

        // Obtener todas las compras con estado 0 y sus usuarios asociados
        $compras = Compra::with('usuario')->where('estado', 0)->get();

        // Pasar las compras a la vista
        return view('admin.pedidos', compact('compras'));
    }

    // Función para gestionar pedido y obtener información de la factura
    public function gestionarPedido($compraId) {

        // Obtener la compra y su usuario asociado
        $compra = Compra::with('usuario')->findOrFail($compraId);

        // Obtener la factura asociada a la compra
        $factura = Factura::where('compra_id', $compraId)->first();

        dd($factura);

        // Pasar la compra, usuario y factura a la vista
        return view('admin.gestionar-pedido', compact('compra', 'factura'));
    }
}
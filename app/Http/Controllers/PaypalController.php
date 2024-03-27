<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Factura;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;

class PaypalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function pago(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken =  $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            'application_context' => [
                "return_url" => route("paypal_success", ['direccion' => $request->get('direccion'), 'indicaciones' => $request->get('indicaciones')]),
                "cancel_url" => route("paypal_cancel")
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "value" => round($request->price, 2),
                        "currency_code" => "USD"
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
        } else {
            return route('paypal_cancel');
        }
    }

    public function success(Request $request)
    {
        $pagoTotal = Session::get('pago');
        $productos = Session::get('productos');
        $direccion = $request->query('direccion');
        $indicaciones = $request->query('indicaciones');
        // dd($productos);

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $fechaActual =  Now();
            $datosCompra = [
                'fecha_hora' => $fechaActual,
                'costo_total' => $pagoTotal,
                'direccion' => $request->get('direccion'),
                'comentario' => $request->get('indicaciones'),
                'user_id' => Auth::id(),
            ];
            Compra::create($datosCompra);
            Session::forget('pago');

            $compra = Compra::Select('id', 'direccion', 'comentario')->where('user_id', Auth::id())->latest()->first();


            foreach ($productos as $producto) {
                // Crear una nueva factura para cada producto en esta compra
                $factura = new Factura();
                $factura->cantidad_producto = 1;
                $factura->precio = trim($producto['precio'], '$ ');
                $factura->subtotal = trim($producto['precio'], '$ ');
                $factura->compra_id = $compra->id;
                $factura->producto_id = $producto['id'];
                $factura->save();
            }


            $datosUsuario = Auth::user();
            // $direccion = Compra::Select('direccion','comentario')->where('user_id', Auth::id())->latest()->first();

            return view('paginas.detalle_factura', compact('compra', 'datosUsuario'));
        } else {
            return redirect()->route('paypal_cancel');
        }
    }

    public function cancel(Request $request)
    {
        return "Paypal rechazo la compra";
    }

    public function generatePDF(Request $request)
    {

        $datosUsuario = Auth::user();
        $comprasUsuario = Compra::where('user_id', Auth::id())->latest()->first();
        $direccion = Compra::Select('direccion')->where('user_id', Auth::id())->latest()->first();
        $facturaUsuario = Factura::select('facturas.*', 'compras.fecha_hora', 'productos.nombre as nombre_producto')
            ->join('compras', 'facturas.compra_id', '=', 'compras.id')
            ->join('productos', 'facturas.producto_id', '=', 'productos.id')
            ->where('compras.id', $comprasUsuario->id)
            ->get();

        $pdf = Pdf::loadView('paginas.detalle_factura_pdf', compact('comprasUsuario', 'datosUsuario', 'facturaUsuario'));
        return $pdf->stream();
    }

    public function recibirPago($request)
    {
        $pagoTotal = $request;
        Session::put('pago', $pagoTotal);
        return response()->json(['mensaje' => 'Dato recibido con exito']);
    }

    public function recibirFactura(Request $request)
    {
        $arrayProductos = $request->input('productos');
        Session::put('productos', $arrayProductos);
        return response()->json(['message' => 'Array recibido con exito']);
    }
}

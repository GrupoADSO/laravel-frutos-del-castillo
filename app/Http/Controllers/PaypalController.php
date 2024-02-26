<?php
namespace App\Http\Controllers;

use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaypalController extends Controller
{
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
        $direccion = $request->query('direccion');
        $indicaciones = $request->query('indicaciones');

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $datos = Auth::user();
            return view('paginas.detalle_factura', compact('direccion', 'indicaciones', 'datos'));
        } else {
            return redirect()->route('paypal_cancel');
        }
    }

    public function cancel(Request $request)
    {
        return "Se rechazo la compra por pobre";
    }
}
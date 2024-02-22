<?php

namespace App\Http\Controllers;

use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\Request;

class PaypalController extends Controller
{
    public function pago(Request $request)
    {
        // dd($request->price);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken =  $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            'application_context' => [
                "return_url" => route("paypal_success"),
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
            return back()->route('paypal_cancel');
        }
    }
    public function success(Request $request)
    {
        // dd($_GET,'exito');
        $provider= new PayPalClient;
        $provider->setApiCredentials(config('paypal'));//credenciales
        $token = $provider->getAccessToken();//obtengo token para poder hacer consultas a paypal
        $response = $provider->capturePaymentOrder($request->token);//realizo la captura del pago
        // dd($response);

        if(isset($response['status']) and $response['status']=='COMPLETED'){
            return "Pago exitoso perro!";
        }else{
            return redirect()->route('paypal_cancel');
        }
    }

    public function cancel(Request $request)
    {
        return "Se rechazo la compra por pobre";
    }






}

<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Session;

class DetailPaymentController extends Controller
{
    public static function  index($payment_code)
    {
        $payment = self::payment($payment_code);        

        if ($payment->success == false) {
            return redirect()->back();
        }

        return view(
            'payment.status-payment',
            [
                "title" => "Detail Payment",
                "data" => [
                    "payment" => $payment->data
                ]
            ]
        );
    }

    public static function payment($payment_code)
    {
        $client = new Client();

        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $request = new Psr7Request('GET', config('api.base_url') . 'api/payment/status?payment_code=' . $payment_code);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        return $response;
    }
}

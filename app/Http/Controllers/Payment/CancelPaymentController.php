<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Throwable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CancelPaymentController extends Controller
{
    public static function cancel_payment(Request $request)
    {
        $client = new Client();

        if (isset($request['payment_code']) && $request['payment_code'] != "") {
            $payment_code = $request->input('payment_code');
        } else {
            return redirect()->back()->with('error', 'payment not found!');
        }

        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $options = [
            'multipart' => [
                [
                    'name' => 'payment_code',
                    'contents' => $payment_code
                ]
            ]
        ];

        $endpoint = config('api.base_url') . 'api/payment/cancel';

        try {
            $req = new Psr7Request('POST', $endpoint, $headers);
            $res = $client->sendAsync($req, $options)->wait();
        } catch (Throwable $e) {
            return redirect()->route('setting')->with("Failed cancel payment");
        }

        $response = json_decode($res->getBody());

        if ($response->success == true) {
            return redirect()->route('setting')->with("Success cancel payment");
        } else {
            return redirect()->route('setting')->with("Failed cancel payment");
        }

        return redirect()->back();
    }
}

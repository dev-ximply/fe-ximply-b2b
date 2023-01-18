<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Throwable;

class PostPaymentController extends Controller
{
    public static function post_payment(Request $request)
    {
        $client = new Client();

        if (isset($request['user_id']) && $request['user_id'] != "") {
            $user_id = Auth::user()['id'];
        } else {
            return redirect("/payment/subscription")->with('error', 'user not found!');
        }

        if (isset($request['currency']) && $request['currency'] != "" && in_array($request['currency'], ['idr'])) {
            // $currency = $request->input('currency');
            $currency = "idr";
        } else {
            return redirect("/payment/subscription")->with('error', 'please add currency!');
        }

        if (isset($request['total_amount']) && $request['total_amount'] != "") {
            // $total_amount = $request->input('total_amount');
            $total_amount = "25000";
        } else {
            return redirect("/payment/subscription")->with('error', 'amount not valid!');
        }

        if (isset($request['object_type']) && $request['object_type'] != "") {
            // $object_type = $request->input('object_type');
            $object_type = "subscription";
        } else {
            return redirect("/payment/subscription")->with('error', 'object not valid!');
        }

        if (isset($request['object_id']) && $request['object_id'] != "") {
            // $object_id = $request->input('object_id');
            $object_id = "10001";
        } else {
            return redirect("/payment/subscription")->with('error', 'object not valid!');
        }

        if (isset($request['payment_channel']) && $request['payment_channel'] != "") {
            $payment_channel = $request->input('payment_channel');
        } else {
            return redirect("/payment/subscription")->with('error', 'please choose payment method!');
        }

        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $options = [
            'multipart' => [
                [
                    'name' => 'user_id',
                    'contents' => $user_id
                ],
                [
                    'name' => 'currency',
                    'contents' => $currency
                ],
                [
                    'name' => 'total_amount',
                    'contents' => $total_amount
                ],
                [
                    'name' => 'object_type',
                    'contents' => $object_type
                ],
                [
                    'name' => 'object_id',
                    'contents' => $object_id
                ],
                [
                    'name' => 'payment_channel',
                    'contents' => $payment_channel
                ]
            ]
        ];

        $endpoint = config('api.base_url') . 'api/payment/post';

        try {
            $req = new Psr7Request('POST', $endpoint, $headers);
            $res = $client->sendAsync($req, $options)->wait();
        } catch (Throwable $e) {
            return redirect()->route('index');
        }

        $response = json_decode($res->getBody());

        $url_payment = $response->data->redirect_url;

        return redirect($url_payment);
    }
}

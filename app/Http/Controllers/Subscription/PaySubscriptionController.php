<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Session;

class PaySubscriptionController extends Controller
{
    public static function index(Request $request)
    {
        $list_channel = self::list_channel(Auth::user()['id']);

        return view(
            'subscription.subscription-pay',
            [
                "title" => "subscription payment",
                "data" => [
                    "list_channel" => $list_channel 
                ]                
            ]
        );
    }

    public static function list_channel($user_id)
    {
        $client = new Client();

        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $request = new Psr7Request('GET', config('api.base_url') . 'api/faspay/channel?user_id=' . $user_id, $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }
}

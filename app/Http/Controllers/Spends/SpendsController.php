<?php

namespace App\Http\Controllers\Spends;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Session;

class SpendsController extends Controller
{
    public static function get_balance($user_id)
    {
        $client = new Client();
        
        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $request = new Psr7Request('GET', config('api.base_url') . 'api/spend/balance?user_id=' . $user_id, $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return collect([
                "assign_limit" => 0,
                "remain_limit" => 0,
                "used_limit" => 0,
                "budget_spending" => 0
            ]);
        }

        return collect($response->data);
    }
}

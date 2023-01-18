<?php

namespace App\Http\Controllers\Budgets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class TopUpApprovalController extends Controller
{
    //
    public static function index(){
        return view(
            'budget.top-up-approval',
            [
                'title' => 'Top Up Approval',
                'section' => 'top_up_approval',
                'data' => [
                    'top_up' => self::top_up(Auth::user()['id'])
                ]
            ]
        );
    }

    public static function top_up($user_id, $token = false){
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer '.Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $request = new Psr7Request('GET', config('api.base_url').'api/spend/balance?user_id='.$user_id, $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if($response->success==false){
            return[];
        }

        return $response->data;
    }


}

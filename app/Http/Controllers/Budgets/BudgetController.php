<?php

namespace App\Http\Controllers\Budgets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;

class BudgetController extends Controller
{
    public static function index()
    {
        return view(
            'budget',
            [
                'title' => 'budget',
                'section' => 'budget',
                'data' => [
                    'limit' => self::get_limit(Auth::user()['id']),
                    'members' => self::list_member(Auth::user()['id']),
                    // 'approval' => self::list_approval(Auth::user()['id'])
                ]
            ]
        );
    }    

    public static function get_limit($user_id, $token = false)
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
            return [];
        }

        return $response->data;
    }

    public static function list_member($user_id)
    {
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];
        $request = new Psr7Request('GET', config('api.base_url') . 'api/spend/list/assigned/'. Session::get('TenantCode') .'?user_id=' . $user_id, $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }

    // public static function list_approval($user_id)
    // {
    //     $client = new Client();
    //     $headers = [
    //         'Authorization' => 'Bearer ' . Session::get('AuthToken'),
    //         'Accept' => 'application/json'
    //     ];
    //     $request = new Psr7Request('GET', config('api.base_url') . 'api/topup/approval/list/' . $user_id, $headers);
    //     $res = $client->sendAsync($request)->wait();
    //     $response = json_decode($res->getBody());

    //     if ($response->success == false) {
    //         return [];
    //     }

    //     return $response->data;
    // }
}

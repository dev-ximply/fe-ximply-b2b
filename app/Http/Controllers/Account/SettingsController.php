<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;

class SettingsController extends Controller
{
    public static function index()
    {
        return view(
            'settings',
            [
                'title' => 'settings',
                'section' => 'settings',
                'data' => [
                    'profile' => self::get_profile(Auth::user()['id']),
                    'transactions' => self::get_transactions(Auth::user()['id'])
                ]
            ]
        );
    }

    public static function account_settings(){
   
        return view('account-settings',
        [
            'title' => 'Account Settings',
            'section' => 'account_settings',
            'data' => [
                'tenant' => self::get_tenant(Auth::user()['id']),
                'user' =>self::get_profile(Auth::user()['id']),
                'member' => self::get_member()
            ]

        ]);
    }

    public static function get_tenant($user_id){
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];
        $request = new Psr7Request('GET', config('api.base_url') . 'api/tenant/info/' .Session::get('TenantCode'). '/' . $user_id, $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }
    public static function get_profile($user_id)
    {
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];
        $request = new Psr7Request('GET', config('api.base_url') . 'api/user/profile/info?user_id=' . $user_id, $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }
    public static function get_member(){
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];
        $request = new Psr7Request('GET', config('api.base_url') . 'api/tenant/member-limit/' .Session::get('TenantCode') , $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }
    public static function get_transactions($user_id)
    {
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];
        $request = new Psr7Request('GET', config('api.base_url') . 'api/payment/list/' . $user_id, $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }
}

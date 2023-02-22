<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class TenansController extends Controller
{
    //
    public static function index()
    {
        return view(
            'tenant',
            [
                'title' => 'Corporate Info',
                'section' => 'corporate_info',
                'data' => [
                    't_info' => self::tenantInfo(Auth::user()['id']),
                ],
            ]

        );
    }

    public static function tenantInfo($user_id)
    {
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];
        $request = new Psr7Request('GET', config('api.base_url') . 'api/tenant/info/' . Session::get('TenantCode') . '/' . $user_id, $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }
}

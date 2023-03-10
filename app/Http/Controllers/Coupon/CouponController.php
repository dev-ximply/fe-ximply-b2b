<?php

namespace App\Http\Controllers\Coupon;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public static function index()
    {
        return view(
            'voucher',
            [
                'title' => 'voucher',
                'section' => 'voucher',
                'data' => [
                    'coupons' =>  self::list(Auth::user()['id']),
                ]
            ]
        );
    }
    public static function list($user_id, $token = false)
    {
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];
        $request = new Psr7Request('GET', config('api.base_url') . 'api/v2/coupon/list?user_id=' . $user_id, $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());
        if ($response->success == false) {
            return [];
        }
        return $response->data;
    }
}

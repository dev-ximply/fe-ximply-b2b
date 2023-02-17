<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Coupon\CouponController;
use Illuminate\Http\Request;
use App\Http\Controllers\Spends\SpendsController;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Session;
use Throwable;

class DashboardController extends Controller
{
    //
    public function index()
    {
        if (Auth::check()) {
            return redirect("/group");
        } else {
            return view("/auth/login", ['title' => 'Login']);
        }
        
        return view(
            'dashboard',
            [
                'title' => 'Dashboard',
                'section' => 'dashboard',
                'data' => [
                    'limit' => SpendsController::get_balance(Auth::user()['id']),
                    'data_expenses' => self::list(Auth::user()['id']),
                    'voucher' =>  self::list_voucher(Auth::user()['id']),
                    'recent_expenses' =>  self::recent_expenses(Auth::user()['id']),
                    'purpose' => self::list_purpose(Auth::user()['id']),
                    'client' => self::list_client(Auth::user()['id'])
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
        $request = new Psr7Request('GET', config('api.base_url') . 'api/spend/balance?user_id=' . $user_id, $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }

    public static function list_voucher($user_id, $token = false)
    {
        $client = new Client();

        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $request = new Psr7Request('GET', config('api.base_url') . 'api/v2/coupon/list?limit=6&user_id=' . $user_id, $headers);
        try {
            $res = $client->sendAsync($request)->wait();
            $response = json_decode($res->getBody());
        } catch (Throwable $th) {
            return [];
        }

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }

    public static function recent_expenses($user_id, $token = false)
    {
        $client = new Client();

        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $request = new Psr7Request('GET', config('api.base_url') . 'api/expense/list/basic?user_id=' . $user_id . '&limit=10', $headers);

        try {
            $res = $client->sendAsync($request)->wait();
            $response = json_decode($res->getBody());
        } catch (Throwable $th) {
            return [];
        }

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }
    public static function list_purpose($user_id, $token = false)
    {
        $client = new Client();

        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $request = new Psr7Request('GET', config('api.base_url') . 'api/purpose/list/index?user_id=' . $user_id, $headers);

        try {
            $res = $client->sendAsync($request)->wait();
            $response = json_decode($res->getBody());
        } catch (Throwable $th) {
            return [];
        }

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }


    public static function list_client($user_id, $token = false)
    {
        $client = new Client();

        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $request = new Psr7Request('GET', config('api.base_url') . 'api/partner/list/' . Session::get('TenantCode') .'?user_id=' . $user_id, $headers);

        try {
            $res = $client->sendAsync($request)->wait();
            $response = json_decode($res->getBody());
        } catch (Throwable $th) {
            return [];
        }

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }
}

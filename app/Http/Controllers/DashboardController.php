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
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view(
            'dashboard',
            [
                'title' => 'Dashboard',
                'section' => 'dashboard',
                'data' => [
                    'limit' => SpendsController::get_balance(Auth::user()['id']),
                    'reports' => self::list_report($request, Auth::user()['id']),
                    'voucher' =>  self::list_voucher(Auth::user()['id']),
                    'recent_expenses' =>  self::recent_expenses(Auth::user()['id']),
                    'purpose' => self::list_purpose(Auth::user()['id']),
                    'client' => self::list_client(Auth::user()['id'])
                ]
            ]
        );
    }


    public function detailProfil($user_id, $token)
    {
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json'
        ];

        $url = config('api.base_url') . 'api/user/profile/info?user_id=' . $user_id;
        $response = Http::withHeaders($headers)
            ->get($url);

        if ($response->successful()) {
            return $response->json()['data'];
        }

        return false;
    }

    public static function list_report(Request $request, $user_id, $token = false)
    {
        $client = new Client();

        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $endpoint = config('api.base_url') . 'api/reports/expenses/' . $user_id . '?';

        if (isset($request->filter_expense_type) && $request->filter_expense_type != "" && $request->filter_expense_type != null) {
            $endpoint .= "expense_type=" . $request->filter_expense_type . "&";
        }

        if (isset($request->filter_start_date) && $request->filter_start_date != "" && $request->filter_start_date != null) {
            $endpoint .= "start_date=" . $request->filter_start_date . "&";
        }

        if (isset($request->filter_end_date) && $request->filter_end_date != "" && $request->filter_end_date != null) {
            $endpoint .= "end_date=" . $request->filter_end_date . "&";
        }

        if (isset($request->filter_group) && $request->filter_group != "" && $request->filter_group != null) {
            $endpoint .= "group_id=" . $request->filter_group . "&";
        }

        if (isset($request->filter_member) && $request->filter_member != "" && $request->filter_member != null) {
            $endpoint .= "member_id=" . $request->filter_member . "&";
        }

        $request = new Psr7Request('GET', $endpoint, $headers);

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

        $request = new Psr7Request('GET', config('api.base_url') . 'api/partner/list/' . Session::get('TenantCode') . '?user_id=' . $user_id, $headers);

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

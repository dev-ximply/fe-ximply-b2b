<?php

namespace App\Http\Controllers\Expenses;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dropdowns\CategoriesController;
use App\Http\Controllers\Spends\SpendsController;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ExpensesController extends Controller
{
    public function index(Request $request)
    {
        $statusType = $request->statusType;
        if (session()->get('is_superadmin') == true) {
            return redirect('/');
        } else {
            return view(
                'expenses',
                [
                    'title' => 'expense',
                    'section' => 'expense',
                    'data' => [
                        'limit' => SpendsController::get_balance(Auth::user()['id']),
                        'expenses' => self::asyncGetExpenses(Auth::user()['id'], $statusType),
                        // 'expenses' => self::list(Auth::user()['id']),
                        'coupons' => self::list_coupon(Auth::user()['id'])
                    ]
                ]
            );
        }
    }

    public function asyncGetExpenses($user_id, $statusType = null)
    {
        $headers = [
            'Authorization' => 'Bearer ' . session()->get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $params = [];
        $params['user_id'] = $user_id;
        if ($statusType != null) {
            $params['status'] = $statusType;
        }

        $url = config('api.base_url') . 'api/expense/list/nested?user_id=';
        $response = Http::withHeaders($headers)
            ->asForm()
            ->get($url, $params);

        $response = json_decode($response->getBody());
        // dd($response);

        if ($response->success == false) {
            return [];
        }

        return $response->data;

        // if ($response->successful()) {
        //     return $response->json()['data'];
        // }

        // throw new \Exception($response->json()['message']);
    }

    public static function list($user_id, $token = false)
    {
        $client = new Client();

        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $request = new Psr7Request('GET', config('api.base_url') . 'api/expense/list/nested?user_id=' . $user_id, $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }

    public static function list_coupon($user_id, $token = false)
    {
        $client = new Client();

        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $request = new Psr7Request('GET', config('api.base_url') . 'api/coupon/list?user_id=' . $user_id, $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }
}

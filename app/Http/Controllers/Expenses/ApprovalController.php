<?php

namespace App\Http\Controllers\Expenses;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Spends\SpendsController;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Auth;

class ApprovalController extends Controller
{
    //
    public static function index()
    {
        return view(
            'approval',
            [
                'title' => 'Approval',
                'section' => 'approval',
                'data' => [
                    'limit' => SpendsController::get_balance(Auth::user()['id']),
                    'expense_approval' => self::list_expense_approval(Auth::user()['id']),
                ]
            ]
        );
    }

    public static function list_expense_approval($user_id, $token = false)
    {
        $client = new Client();

        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $request = new Psr7Request('GET', config('api.base_url') . 'api/expense/approval/list/' . Session::get('TenantCode') . '/?user_id=' . $user_id, $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return [];
        }

        return $response->data;
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

        $url = config('api.base_url') . 'api/expense/approval/list/' . Session::get('TenantCode');
        $response = Http::withHeaders($headers)
            ->asForm()
            ->get($url, $params);

        $response = json_decode($response->getBody());

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }
}

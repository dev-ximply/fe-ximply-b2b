<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Spends\SpendsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;

class ViewReportsController extends Controller
{
    public static function index($id)
    {
        return view(
            'report.view-report',
            [
                'title' => 'report',
                'section' => 'report',
                'data' => [
                    'limit' => SpendsController::get_balance(Auth::user()['id']),
                    'reports' => self::single(Auth::user()['id'], $id),
                ]
            ]
        );
    }

    public static function single($user_id, $report_id, $token = false)
    {
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer '.Session::get('AuthToken'),
            'Accept' => 'application/json'
          ];
        $request = new Psr7Request('GET', config('api.base_url') . 'api/report/single?user_id=' . $user_id . '&report_id=' . $report_id, $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return [];
        }

        $result = $response->data;

        return $result;
    }
}

<?php

namespace App\Http\Controllers\Budgets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class TopUpApprovalController extends Controller
{
    //
    public function index(){
        // dd(self::asyncGetApprovals(Auth::user()['id']));
        return view(
            'budget.top-up-approval',
            [
                'title' => 'Top Up Approval',
                'section' => 'top_up_approval',
                'data' => [
                    'top_up' => self::top_up(Auth::user()['id']),

                ],
                'approvals' => self::asyncGetApprovals(Auth::user()['id']),
            ]
        );
    }

    public function upprove(Request $request){
        // dd($request->all());

        $params =[
            'user_id' => Auth::user()['id'],
            'topup_id' => $request->topup_id,
            'amount_approved' => $request->amount_approved ?? null,
            'decision' => $request->decision,
        ];

        return self::asyncApproveAction($params);
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

    public function asyncGetApprovals($userId){
        $headers = [
            'Authorization' => 'Bearer ' . session()->get('AuthToken'),
            'Accept' => 'application/json'
        ];
        $url = config('api.base_url') . 'api/topup/approval/list/' . $userId;
        $response = Http::withHeaders($headers)
            ->get($url);

        if ($response->successful()) {
            return $response->json()['data'];
        }

        throw new \Exception($response->json()['message']);
    }

    public function asyncApproveAction($params){

        $headers = [
            'Authorization' => 'Bearer ' . session()->get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $url = config('api.base_url') . 'api/topup/approval';
        $response = Http::withHeaders($headers)
            ->asForm()
            ->post($url, $params);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception($response->json()['message']);
    }


}

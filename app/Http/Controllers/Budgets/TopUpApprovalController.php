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
    public function index(Request $request){

        // dd($request->all());
        $statusType = $request->statusType;

        return view(
            'budget.top-up-approval',
            [
                'title' => 'Top Up Approval',
                'section' => 'top_up_approval',
                'data' => [
                    'top_up' => self::top_up(Auth::user()['id']),
                    'list_group_users' => self::list_group_users($request, Auth::user()['id'])

                ],
                'approvals' => self::asyncGetExpenses($request, Auth::user()['id'], $statusType),
                'history' => self::historyTopUp(Auth::user()['id'])
            ]
        );
    }

    public function approve(Request $request){
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

    public function asyncGetExpenses(Request $request, $userId, $statusType=null){
        $headers = [
            'Authorization' => 'Bearer ' . session()->get('AuthToken'),
            'Accept' => 'application/json'
        ];
        // $params =[
        //     'status' => $statusType,
        // ];
        $url = config('api.base_url') . 'api/topup/approval/list/' . $userId . '?status=pending' . '&order=asc' . "&";

        if(isset($request->start)){
            $url .= "date_start=" . $request->start . "&";
        }

        if(isset($request->end)){
            $url .= "date_end=" . $request->end . "&";
        }

        if(isset($request->filter_user)){
            $url .= "filter_user=" . $request->filter_user . "&";
        }

        $response = Http::withHeaders($headers)
            ->asForm()
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

    // public function list_group_users(Request $request, $userId, $statusType=null){
    //     $headers = [
    //         'Authorization' => 'Bearer ' . session()->get('AuthToken'),
    //         'Accept' => 'application/json'
    //     ];
    //     // $params =[
    //     //     'status' => $statusType,
    //     // ];
    //     $url = config('api.base_url') . 'api/list/users';

      
        
    //     $response = Http::withHeaders($headers)
    //         ->asForm()
    //         ->get($url);

    //     if ($response->successful()) {
    //         return $response->json()['data'];
    //     }

    //     throw new \Exception($response->json()['message']);
    // }

    public function list_group_users(Request $request, $user_id, $statusType = null)
    {
        // $client = new Client();


        $headers = [
            'Authorization' => 'Bearer ' . session()->get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $url = config('api.base_url') . 'api/list/users';

        // if (isset($request->filter_user)){
        //     $url .= "filter_user=" . $request->filter_user . "&";
        // }

        $response = Http::withHeaders($headers)
            ->asForm()
            ->get($url);

        $response = json_decode($response->getBody());

        // dd($response);

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }

    public static function historyTopUp($user_id){
        $headers = [
            'Authorization' => 'Bearer ' . session()->get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $url = config('api.base_url') . 'api/topup/approval/list/' . $user_id . '?status=done';

        $response = Http::withHeaders($headers)->asForm()->get($url);

        if ($response->successful()) {
            return $response->json()['data'];
        }

        throw new \Exception($response->json()['message']);
    }

}

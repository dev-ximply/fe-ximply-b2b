<?php

namespace App\Http\Controllers\Expenses;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Spends\SpendsController;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Throwable;

class ApprovalController extends Controller
{
    public function index(Request $request)
    {
        $statusType = $request->statusType;

        return view(
            'approval',
            [
                'title' => 'Approval',
                'section' => 'approval',
                'data' => [
                    'limit' => SpendsController::get_balance(Auth::user()['id']),                    
                    'expense_approval' => self::asyncGetExpenses($request,Auth::user()['id'], $statusType),
                    'history_approval' => self::history_approval($request,Auth::user()['id'], $statusType),
                    'list_group_users' => self::list_group_users($request, Auth::user()['id'])
                ]
            ]
        );
    }

    public function asyncGetExpenses(Request $request, $user_id, $statusType = null)
    {
        $headers = [
            'Authorization' => 'Bearer ' . session()->get('AuthToken'),
            'Accept' => 'application/json'
        ];

        // $params = [];
        // $params['user_id'] = $user_id;
        // if ($statusType != null) {
        //     $params['status'] = $statusType;
        // }

        $url = config('api.base_url') . 'api/expense/approval/list/' . Session::get('TenantCode') . "?status=pending" . "&order=asc" . "&";

        // if (isset($request->statusT) && in_array($request->statusT, ['pending', 'done', 'approved', 'rejected']) == true) {
        //     $url .= "status=" . $request->statusT . "&";
        // }

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

        $response = json_decode($response->getBody());

        // dd($response);

        if ($response->success == false) {
            return [];
        }

        return $response->data;


        // $headers = [
        //     'Authorization' => 'Bearer ' . session()->get('AuthToken'),
        //     'Accept' => 'application/json'
        // ];

        // $params = [];
        // $params['user_id'] = $user_id;
        // if ($statusType != null) {
        //     $params['status'] = $statusType;
        // }

        // $url = config('api.base_url') . 'api/expense/approval/list/' .  Session::get('TenantCode') . '/?user_id=';
        // $response = Http::withHeaders($headers)
        //     ->asForm()
        //     ->get($url, $params);

        // $response = json_decode($response->getBody());
        // // dd($response);

        // if ($response->success == false) {
        //     return [];
        // }

        // return $response->data;
    }


    public static function history_approval(Request $request, $user_id){
        $headers = [
            'Authorization' => 'Bearer ' . session()->get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $url = config('api.base_url') . 'api/expense/approval/list/' . Session::get('TenantCode') . "?status=done" ;

        // if(isset($request->statusType) && in_array($request->statusType, ['done', 'approved', 'rejected']) == true){
        //     $url .= 'status=' . $request->statusType . '&';
        // }

        $response = Http::withHeaders($headers)->asForm()->get($url);

        $response = json_decode($response->getBody());

        if($response->success ==false){
            return [];
        }


        return $response->data;

    }


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

}

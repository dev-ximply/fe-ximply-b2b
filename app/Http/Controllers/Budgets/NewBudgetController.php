<?php

namespace App\Http\Controllers\Budgets;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Spends\SpendsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;

class NewBudgetController extends Controller
{
    public static function index()
    {
        return view(
            'budget.new-budget',
            [
                'title' => 'New Budget',
                'section' => 'budget',
                'data' => [
                    'limit' => SpendsController::get_balance(Auth::user()['id']),
                    'notassign_members' => self::notassign_members(Auth::user()['id'])
                ],
            ]
        );
    }

    public static function notassign_members($user_id)
    {
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];
        $request = new Psr7Request('GET', config('api.base_url') . 'api/spend/list/notassign/' . Session::get('TenantCode') . '?user_id=' . $user_id, $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }

    public static function add_spend(Request $request){

        $user_id = Auth::user()['id'];
        $tenant_code = Session::get('TenantCode');
        $assign_user = $request['assign_user_id'];
        $limit = $request['limit'];
        $auto_approve_limit = $request['auto_approve_limit'];
        $now = date("Y-m-d");
        $expire_date = date("Y-m-d", strtotime("+1 month", strtotime($now)));
        // $expire_date = $request['expire_date'];

        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . session()->get('AuthToken'),
            'Accept' => 'application/json'
        ];
        $options = [
            'multipart' => [
                [
                    'name' => 'user_id',
                    'contents' => $user_id
                ],
                [
                    'name' => 'tenant_code',
                    'contents' => $tenant_code
                ],
                [
                    'name' => 'assign_user_id',
                    'contents' => $assign_user
                ],
                [
                    'name' => 'limit',
                    'contents' => $limit
                ],
                [
                    'name' => 'auto_approve_limit',
                    'contents' => $auto_approve_limit
                ],
                [
                    'name' => 'expire_date',
                    'contents' => $expire_date
                ]
            ]
        ];
        
        $request = new Psr7Request('POST', config('api.base_url') . 'api/spend/member/assign', $headers);        

        $res = $client->sendAsync($request, $options)->wait();

        $response = json_decode($res->getBody());

        if($response->success == false){
            session();
            return back()->with('error', $response->message)->withInput();
        }

        return redirect("/budget")->with('success', 'assign budget success');
    }
}

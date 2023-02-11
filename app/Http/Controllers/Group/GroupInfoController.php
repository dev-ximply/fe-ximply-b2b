<?php

namespace App\Http\Controllers\Group;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupInfoController extends Controller
{
    //
<<<<<<< HEAD
    public static function index(){
=======
    public static function index($id){

>>>>>>> 573a3f5f6b65b0a4f844edc5634624112d65920c
        return view('group-info',
        [
            'title' => 'Group Info',
            'section' => 'group',
            'data' => [
                'group' => self::group_(Auth::user()['id']),
                'budget' => self::budget(Auth::user()['id']),
<<<<<<< HEAD
		        'member_list' => self::member(Auth::user()['id']),            ]
=======
		        'member_list' => self::member(Auth::user()['id'],$id),
                'group_detail' => self::groupById(Auth::user()['id'],$id)           
            ]
>>>>>>> 573a3f5f6b65b0a4f844edc5634624112d65920c
        ]  
    );
    }


    public static function group_($user_id)
    {
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];
<<<<<<< HEAD
        $request = new Psr7Request('GET', config('api.base_url') . 'api/group/member/list/' . Session::get('TenantCode') . '?user_id=' . $user_id, $headers);
=======
        $request = new Psr7Request('GET', config('api.base_url') . 'api/group/list/' . Session::get('TenantCode') . '?user_id=' . $user_id, $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }
    public static function groupById($user_id,$id)
    {
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];
        $request = new Psr7Request('GET', config('api.base_url') . 'api/group/list/' . Session::get('TenantCode') . '?user_id=' . $user_id .'&group_id=' . $id , $headers);
>>>>>>> 573a3f5f6b65b0a4f844edc5634624112d65920c
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }


    public static function budget($user_id)
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
<<<<<<< HEAD

    public static function member($user_id)
=======
    public static function member($user_id,$id)
>>>>>>> 573a3f5f6b65b0a4f844edc5634624112d65920c
    {
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];
<<<<<<< HEAD
        $request = new Psr7Request('GET', config('api.base_url') . 'api/group/list/' . Session::get('TenantCode')  . '?user_id=' . $user_id, $headers);
=======
        $request = new Psr7Request('GET', config('api.base_url') . 'api/member/list/' . Session::get('TenantCode')  . '?user_id=' . $user_id.'&group_id=' . $id, $headers);
>>>>>>> 573a3f5f6b65b0a4f844edc5634624112d65920c
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }
}

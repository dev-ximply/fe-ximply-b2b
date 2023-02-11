<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Psr7\Request as Psr7Request;

class MemberInfoController extends Controller
{
    //

    public static function index()
    {
        return view(
            'info-member',
            [
                'title' => 'Info Member',
                'section' => 'info_member',
                'data' => [
                    'member_info' => self::memberInfo(Auth::user()['id'])
                ]
            ]
        );
    }

    public static function memberInfo($user_id)
    {
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];
        $request = new Psr7Request('GET', config('api.base_url') . 'api/group/member/list/' . Session::get('TenantCode') . '?user_id=' . $user_id, $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }
}

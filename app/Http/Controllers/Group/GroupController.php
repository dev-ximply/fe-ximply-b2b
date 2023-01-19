<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class GroupController extends Controller
{
    public static function index()
    {
        return view(
            'group',
            [
                'title' => 'Group',
                'section' => 'group',
                'data' => [
                    'groups' => self::groups(Auth::user()['id']),
                ],
            ]
        );
    }

    public function updateGroup(Request $request)
    {
        $params = [
            'user_id' => Auth::user()['id'],
            'tenant_code' => session()->get('TenantCode'),
            'group_id' => $request->group_id,
            'group_name' => $request->group_name,
            'have_partnership' => $request->has_client ? 1 : 0,
        ];

        return self::asynUpdateGroup($params);
    }

    public static function groups($user_id)
    {
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer '.Session::get('AuthToken'),
            'Accept' => 'application/json',
        ];
        $request = new Psr7Request('GET', config('api.base_url').'api/group/list/'.Session::get('TenantCode').'?user_id='.$user_id, $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }

    private function asynUpdateGroup($params)
    {
        $headers = [
            'Authorization' => 'Bearer '.session()->get('AuthToken'),
            'Accept' => 'application/json',
        ];

        $url = config('api.base_url').'api/group/edit';
        $response = Http::withHeaders($headers)
            ->asForm()
            ->post($url, $params);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception($response->json()['message']);
    }
}

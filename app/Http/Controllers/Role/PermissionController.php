<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{

    public function index()
    {
        return view('permission')->with([
            'title' => 'Permission',
            'section' => 'permission',
            'permissions' => collect(self::getPermissions()),
            'data' =>[
                'tenant' => self::infoTenant(Auth::user()['id'])
            ]
        ]);
    }

    public function getPermissions()
    {
        $headers = [
            'Authorization' => 'Bearer ' . session()->get('AuthToken'),
            'Accept' => 'application/json'
        ];
        $url = config('api.base_url') . 'api/role/list/' . session()->get('TenantCode');
        $response = Http::withHeaders($headers)
            ->get($url);

        if ($response->successful()) {
            return $response->json()['data'];
        }

        throw new \Exception($response->json()['message']);
    }

    public function changePermission(Request $request)
    {

        $headers = [
            'Authorization' => 'Bearer ' . session()->get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $params = [
            'tenant_code' => session()->get('TenantCode'),
            'user_id' => Auth::user()['id'],
            $request->permission => $request->value,
            'role_id' => $request->role_id,
        ];

        // dd($params);

        $url = config('api.base_url') . 'api/role/edit/permission';
        $response = Http::withHeaders($headers)
            ->asForm()
            ->post($url, $params);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception($response->json()['message']);
    }

    public function changeRoleName(Request $request)
    {
        $headers = [
            'Authorization' => 'Bearer ' . session()->get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $params = [
            'tenant_code' => session()->get('TenantCode'),
            'user_id' => Auth::user()['id'],
            'new_role_name' => $request->new_role_name,
            'role_id' => $request->role_id,
        ];

        $url = config('api.base_url') . 'api/role/edit/name';
        $response = Http::withHeaders($headers)
            ->asForm()
            ->post($url, $params);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception($response->json()['message']);
    }


    
    public static function infoTenant($user_id)
    {
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json',
        ];
        $request = new Psr7Request('GET', config('api.base_url') . 'api/tenant/info/' . Session::get('TenantCode') .  '/' . $user_id, $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }
}

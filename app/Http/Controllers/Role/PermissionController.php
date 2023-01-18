<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PermissionController extends Controller
{

    public function index()
    {
        return view('permission')->with([
            'title' => 'Permission',
            'section' => 'permission',
            'permissions' => collect(self::getPermissions()),
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
}

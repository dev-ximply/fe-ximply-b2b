<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Spends\SpendsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Http;

class MembersController extends Controller
{
    public static function index()
    {
        return view(
            'employee',
            [
                'title' => 'Manage Teams',
                'section' => 'employee',
                'data' => [
                    'employee' => self::list(Auth::user()['id']),
                    'list_department' => self::list_department(Auth::user()['id']),
                    'list_role' => self::list_role(Auth::user()['id']),
                    'have_member' => self::have_member(Auth::user()['id'])
                ],
                
            ]
        );
    }

    public function updateEmployee(Request $request)
    {
        $tenantCode = session()->get('TenantCode');
        $userId = Auth::user()['id'];
        $emailId = Auth::user()['id'];
        // update departement
        $paramsDepartements = [
            'tenant_code' => $tenantCode,
            'group_id' => $request->departement_id,
            'user_id' => $userId,
            'assign_user_id' => $request->user_id,
        ];

        $paramsRole = [
            'tenant_code' => $tenantCode,
            'role_id' => $request->role_id,
            'user_id' => $userId,
            'assign_user_id' => $request->user_id,
        ];

        $paramsProfile = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'user_id' => $request->user_id,
        ];

        // $paramsEmail = [
        //     'user_id' => $userId,
        //     'email' => $emailId,
        // ];

        try {

          
            if ($request->departement_id) {

                self::updateDepartement($paramsDepartements);
            }

            if ($request->role_id) {

                self::updateRole($paramsRole);
            }

            if ($request->first_name || $request->last_name){
                self::updateProfile($paramsProfile);
            }
            

            // if($emailId){
            //     self::updateEmail($paramsEmail);
            // }

            return [
                "status" => 200,
                "success" => true,
                "message" => "berhasil"
            ];
        } catch (\Exception $e) {

            throw new \Exception($e->getMessage());
        }
    }

    public static function list($user_id)
    {
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];
        $request = new Psr7Request('GET', config('api.base_url') . 'api/member/list/' . Session::get('TenantCode') . '?user_id=' . Auth::user()['id'], $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return [];
        }
        return $response->data;
    }

    public static function list_department($user_id)
    {
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];
        $request = new Psr7Request('GET', config('api.base_url') . 'api/group/list/' . Session::get('TenantCode') . '?user_id=' . $user_id, $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }

    public static function list_role($user_id)
    {
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];
        $request = new Psr7Request('GET', config('api.base_url') . 'api/role/list/' . Session::get('TenantCode'), $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }

    public function updateDepartement($params)
    {

        $headers = [
            'Authorization' => 'Bearer ' . session()->get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $url = config('api.base_url') . 'api/group/member/change';
        $response = Http::withHeaders($headers)
            ->asForm()
            ->post($url, $params);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception($response->json()['message']);
    }

    public function updateRole($params)
    {

        $headers = [
            'Authorization' => 'Bearer ' . session()->get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $url = config('api.base_url') . 'api/user/role/edit';
        $response = Http::withHeaders($headers)
            ->asForm()
            ->post($url, $params);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception($response->json()['message']);
    }
    public function updateEmail($params)
    {

        $headers = [
            'Authorization' => 'Bearer ' . session()->get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $url = config('api.base_url') . 'api/user/email/change';
        $response = Http::withHeaders($headers)
            ->asForm()
            ->post($url, $params);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception($response->json()['message']);
    }

    public static function updateProfile($params){

        $headers = [
            'Authorization' => 'Bearer ' . session()->get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $url = config('api.base_url') . 'api/user/profile/update';
        $response = Http::withHeaders($headers)
            ->asForm()
            ->post($url, $params);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception($response->json()['message']);

    }

    public static function have_member($user_id)
    {
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];
        $request = new Psr7Request('GET', config('api.base_url') . 'api/group/list/' . Session::get('TenantCode') . '?user_id=' . $user_id, $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }
}

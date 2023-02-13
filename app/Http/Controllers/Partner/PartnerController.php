<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Http;

class PartnerController extends Controller
{
    public function index()
    {
        // dd(self::partners(Auth::user()['id']));
        return view(
            'partner',
            [
                'title' => 'Partner',
                'section' => 'partner',
                'data'  => [
                    'groups' => self::groups(Auth::user()['id']),
                    'partners' => self::partners(Auth::user()['id']),
                    't_partner' => self::list_partners(Auth::user()['id']),
                    'a_partner' => self::assign_partner(Auth::user()['id'])
                ],
                // 'members' => self::asyncGetMembers(),
            ]
        );
    }

    public function addPartner(Request $request)
    {
        try {
            //add parner
            $paramAddPartner = [
                'user_id' => Auth::user()['id'],
                'tenant_code' => session()->get('TenantCode'),
                'company_name' => $request->company_name,
                'contact_name' => $request->contact_name,
                'group_id' => $request->group_id,
                'handphone' => $request->handphone,
                'email' => $request->email,
            ];

            $newPartner = $this->asyncAddPartner($paramAddPartner);

            // assign user
            $paramAssignUserToPartner = [
                'user_id' => Auth::user()['id'],
                'tenant_code' => session()->get('TenantCode'),
                'partner_id' => $newPartner['data']['id'],
                'assign_user_id' =>  $request->assign_user_id,
            ];

            return $this->asyncAddUserToPartner($paramAssignUserToPartner);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function updatePartner(Request $request)
    {
        $params = [
            'tenant_code' => session()->get('TenantCode'),
            'user_id' => Auth::user()['id'],
            'partner_id' => $request->partner_id,
            'company_name' => $request->company_name,
            'contact_name' => $request->contact_name,
            'handphone' => $request->handphone,
            'email' => $request->email,
            'group_id' => $request->group_id,
        ];

        // assign user
        if ($request->assign_user_id) {
            $paramAssignUserToPartner = [
                'user_id' => Auth::user()['id'],
                'tenant_code' => session()->get('TenantCode'),
                'partner_id' => $request->partner_id,
                'assign_user_id' =>  $request->assign_user_id,
            ];

            $this->asyncAddUserToPartner($paramAssignUserToPartner);
        }


        return self::asyncUpdateParner($params);
    }

    public function deletePartner(Request $request)
    {
        // asyncDeletePartner
        $params = [
            'tenant_code' => session()->get('TenantCode'),
            'user_id' => Auth::user()['id'],
            'partner_id' => $request->partner_id
        ];

        return $this->asyncDeletePartner($params);
    }

    public function updatePartnerAssign(Request $request)
    {
        // dd($request->all());

        $params = [
            'user_id' => Auth::user()['id'],
            'tenant_code' => session()->get('TenantCode'),
            'assign_user_id' => $request->assign_user_id,
            'partner_id' => $request->partner_id,
        ];

        return self::asyncUpdatePartnerAssign($params);
    }

    public static function partners($user_id)
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


    public static function list_partners($user_id)
    {
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $request = new Psr7Request('GET', config('api.base_url') . 'api/partner/list/' . Session::get('TenantCode') . '?user_id=' . $user_id, $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }

    public static function assign_partner($user_id)
    {
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $request = new Psr7Request('GET', config('api.base_url') . 'api/member/list/' . Session::get('TenantCode') . '?user_id=' .   $user_id, $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }

    public static function groups($user_id)
    {
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $request = new Psr7Request('GET', config('api.base_url') . 'api/partner/list/' . Session::get('TenantCode') . '?user_id=' . $user_id, $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }

    public function asyncUpdateParner($params)
    {
        $headers = [
            'Authorization' => 'Bearer ' . session()->get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $url = config('api.base_url') . 'api/partner/edit';
        $response = Http::withHeaders($headers)
            ->asForm()
            ->post($url, $params);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception($response->json()['message']);
    }

    public function asyncUpdatePartnerAssign($params)
    {
        $headers = [
            'Authorization' => 'Bearer ' . session()->get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $url = config('api.base_url') . 'api/partner/relation/add';
        $response = Http::withHeaders($headers)
            ->asForm()
            ->post($url, $params);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception($response->json()['message']);
    }

    public function asyncGetMembers()
    {
        $headers = [
            'Authorization' => 'Bearer ' . session()->get('AuthToken'),
            'Accept' => 'application/json'
        ];
        // api/group/member/list/{{TenantCode}}?user_id=1000001
        $url = config('api.base_url') . 'api/group/member/list/' . session()->get('TenantCode') . '?user_id=' . Auth::user()['id'];
        // dd($url);
        $response = Http::withHeaders($headers)
            // ->asForm()
            ->get($url);

        if ($response->successful()) {
            return $response->json()['data'];
        }

        throw new \Exception($response->json()['message']);
    }

    public function asyncAddPartner($params)
    {
        $headers = [
            'Authorization' => 'Bearer ' . session()->get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $url = config('api.base_url') . 'api/partner/add';
        $response = Http::withHeaders($headers)
            ->asForm()
            ->post($url, $params);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception($response->json()['message']);
    }

    public function asyncAddUserToPartner($params)
    {
        $headers = [
            'Authorization' => 'Bearer ' . session()->get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $url = config('api.base_url') . 'api/partner/relation/add';
        $response = Http::withHeaders($headers)
            ->asForm()
            ->post($url, $params);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception($response->json()['message']);
    }

    public function asyncDeletePartner($params)
    {
        $headers = [
            'Authorization' => 'Bearer ' . session()->get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $url = config('api.base_url') . 'api/partner/delete';
        $response = Http::withHeaders($headers)
            ->asForm()
            ->post($url, $params);

        if ($response->successful()) {
            return $response->json();
        }

        $response->json()['message'];
    }
}

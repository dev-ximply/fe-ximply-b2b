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
    public static function index(){
        return view(
            'partner',
            [
                'title' => 'Partner',
                'section' => 'partner',
                'data'  => [
                    'groups' => self::groups(Auth::user()['id']),
                    'partners' => self::partners(Auth::user()['id'])
                ]
            ]
        );
    }

    public function updatePartner(Request $request){
        // dd($request->all());

        $params =[
            'tenant_code' => session()->get('TenantCode'),
            'user_id' => Auth::user()['id'],
            'partner_id' => $request->partner_id,
            'company_name' => $request->company_name,
            'contact_name' => $request->contact_name,
            'handphone' => $request->handphone,
            'email' => $request->email,
        ];

        return self::asyncUpdateParner($params);
    }

    public static function partners($user_id){
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . Session::get('AuthToken'),
            'Accept' => 'application/json'
        ];

        $request = new Psr7Request('GET', config('api.base_url') . 'api/partner/list/' . Session::get('TenantCode'), $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());

        if ($response->success == false) {
            return [];
        }

        return $response->data;
    }

    public static function groups($user_id){
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
}



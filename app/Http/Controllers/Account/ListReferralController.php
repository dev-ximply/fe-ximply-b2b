<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Throwable;

class ListReferralController extends Controller
{
    public static function index()
    {
        return view(
            'referral.list-referral',
            [
                'title' => 'profile',
                'section' => 'list referral',
                'data' => [
        
                    'referral' => self::get_referral(Auth::user()['id'])
                ]
            ]
        );
    }

    public static function get_referral($user_id, $token = false){
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer '.Session::get('AuthToken'),
            'Accept' => 'application/json'
          ];
        $request = new Psr7Request('GET', config('api.base_url').'api/referral/show?user_id='.$user_id, $headers);
        
        try{
            $res = $client->sendAsync($request)->wait();
            $response = json_decode($res->getBody());
        }catch(Throwable){
            return [
                "referral_code" => "oops something wrong",
                "referral_count" => 0,
                "referral_member" => []
            ];
        }    
        
        if($response->success==false){
            return [
                "referral_code" => "oops something wrong",
                "referral_count" => 0,
                "referral_member" => []
            ];
        }

        return $response->data;
    }
}

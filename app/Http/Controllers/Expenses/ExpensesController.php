<?php

namespace App\Http\Controllers\Expenses;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dropdowns\CategoriesController;
use App\Http\Controllers\Spends\SpendsController;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Session;

class ExpensesController extends Controller
{
    public static function index()
    {
        return view(
            'expenses',
            [
                'title'=>'expense',
                'section'=>'expense',
                'data'=>[
                    'limit' => SpendsController::get_balance(Auth::user()['id']),
                    'expenses' => self::list(Auth::user()['id']),    
                    'coupons' => self::list_coupon(Auth::user()['id'])              
                ]
            ]
        );
    }    

    public static function list($user_id, $token = false)
    {
        $client = new Client();

        $headers = [
            'Authorization' => 'Bearer '.Session::get('AuthToken'),
            'Accept' => 'application/json'
          ];
                    
        $request = new Psr7Request('GET', config('api.base_url').'api/expense/list/nested?user_id='.$user_id, $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());
        
        if($response->success==false){
            return [];
        }

        return $response->data;
    }
    
    public static function list_coupon($user_id, $token = false)
    {
        $client = new Client();

        $headers = [
            'Authorization' => 'Bearer '.Session::get('AuthToken'),
            'Accept' => 'application/json'
          ];
                    
        $request = new Psr7Request('GET', config('api.base_url').'api/coupon/list?user_id='.$user_id, $headers);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());
        
        if($response->success==false){
            return [];
        }

        return $response->data;
    }


}

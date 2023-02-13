<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;

class RegisterController extends Controller
{
    public static function index()
    {
        if (Auth::check()) {
            return redirect("/expense");
        }

        return view(
            'auth.register',
            [
                'title' => 'sign up',
                'section' => 'signup'
            ]
        );
    }

    public static function register_action(Request $request)
    {
        $tenant_token = $request->input('tenant_token');
        $first_name = $request->input('firstname');
        $last_name = $request->input('lastname');
        $handphone = $request->input('handphone');
        $email = $request->input('email');
        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');
        $referral_code = false;
        if(isset($request['referral_code'])){
            $referral_code = $request->input('referral_code');
        }
        $register = self::register_post($tenant_token, $first_name, $last_name, $handphone, $email, $password, $password_confirmation, $referral_code);

        if($register->success == false){
            $request->session();
            return redirect("/sign-up")->with('error', $register->message)->withInput();
        }

        return redirect("/sign-in")->with('success', 'Register success, please check your email to confirm you account');
    }

    public static function register_post($tenant_token, $first_name, $last_name, $handphone, $email, $password, $password_confirmation, $referral_code)
    {
        $client = new Client();        

        $options = [
            'multipart' => [
                [
                    'name' => 'tenant_token',
                    'contents' => $tenant_token
                ],
                [
                    'name' => 'first_name',
                    'contents' => $first_name
                ],
                [   
                    'name' => 'last_name',
                    'contents' => $last_name
                ],
                [
                    'name' => 'handphone',
                    'contents' => $handphone
                ],
                [
                    'name' => 'email',
                    'contents' => $email
                ],
                [
                    'name' => 'password',
                    'contents' => $password
                ],
                [
                    'name' => 'password_confirmation',
                    'contents' => $password_confirmation
                ]
            ]
        ];

        
        $request = new Psr7Request('POST', config('api.base_url') . 'api/auth/register');
        $res = $client->sendAsync($request, $options)->wait();
        $response = json_decode($res->getBody());
        return $response;
    }
}

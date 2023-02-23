<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function index()
    {

        if (Auth::check()) {
            if(session()->get('is_superadmin') == true){
                return redirect("/group");
            }else{
                return redirect("/dashboard");
            }
        } else {
            return view("/auth/login", ['title' => 'Login']);
        }
    }

    public function login_action(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $data = [
            "email" => $request->input("email"),
            "password" => $request->input("password"),
        ];

        if (Auth::Attempt($data)) {
            if (Auth::check()) {

                $authAPI = self::authenticationAPI($request->input("email"), $request->input("password"));

                if ($authAPI->success == false) {
                    Auth::logout();
                    return redirect("/sign-in")->with('error', $authAPI->message);
                }

                if ($request->has('rememberMe') && $request->input('rememberMe') == "on") {
                    Cookie::queue('email', $request->email, 120);
                    Cookie::queue('password', $request->password, 120);
                } else {
                    Cookie::queue(Cookie::forget('email'));
                    Cookie::queue(Cookie::forget('password'));
                }

                $AuthToken = $authAPI->authorization->token;
                $TenantCode = $authAPI->authorization->tenant_code;
                $userId = $authAPI->authorization->user_id;
                Session::put('AuthToken', $AuthToken);
                Session::put('TenantCode', $TenantCode);

                $detail = self::detailProfil($userId, $AuthToken);

                $permission = $detail['permission'];

                if ($permission == false) {
                    Session::forget('AuthToken');
                    Session::forget('TenantCode');
                    Auth::logout();
                    return redirect("/sign-in");
                } else {
                    Session::put('is_superadmin', $detail['is_superadmin']);
                    Session::put('policies', $permission['policies']);
                    Session::put('approval_topup', $permission['approval_topup']);
                    Session::put('approval_expense', $permission['approval_expense']);
                    Session::put('approval_prebudget', $permission['approval_prebudget']);
                    Session::put('manage_user', $permission['manage_user']);
                    Session::put('manage_budget', $permission['manage_budget']);
                    Session::put('manage_tenant', $permission['manage_tenant']);
                    Session::put('manage_cards', $permission['manage_cards']);
                }

                if($detail['is_superadmin'] == true){
                    return redirect("/");
                }else{
                    return redirect("/");
                }                
            } else {
                return redirect("/sign-in")->with('error', 'Email or password wrong!');
            }
        } else {
            $request->session();
            return redirect("/sign-in")->with('error', 'Email or password wrong!');
        }
    }

    public function logout_action()
    {
        Session::forget('AuthToken');
        Session::forget('TenantCode');
        Auth::logout();
        return redirect("/sign-in");
    }

    public function authenticationAPI($email, $password)
    {
        $client = new Client();
        $options = [
            'multipart' => [
                [
                    'name' => 'email',
                    'contents' => $email
                ],
                [
                    'name' => 'password',
                    'contents' => $password
                ]
            ]
        ];
        $request = new Psr7Request('POST', config('api.base_url') . 'api/auth/login');
        $res = $client->sendAsync($request, $options)->wait();
        $response = json_decode($res->getBody());
        return $response;
    }

    public function detailProfil($user_id, $token)
    {
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json'
        ];
        
        $url = config('api.base_url') . 'api/user/profile/info?user_id=' . $user_id;
        $response = Http::withHeaders($headers)
            ->get($url);

        if ($response->successful()) {
            return $response->json()['data'];
        }

        return false;
    }
}

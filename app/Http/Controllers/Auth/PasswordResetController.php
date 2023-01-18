<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;

class PasswordResetController extends Controller
{
    public static function index($token = false)
    {
        if(!self::check_token($token)){
            return redirect("/forgot-password")->with('error', "Token password reset has been expired!");
        }

        return view(
            'auth.password-reset',
            [
                'title' => 'Password Reset',
                'section' => 'password-reset',
                'data' => [
                    'token' => $token
                ]
            ]
        );
    }

    public static function check_token($token)
    {
        $client = new Client();
        $request = new Psr7Request('GET', config('api.base_url') . 'api/auth/check-token-password-reset?token=' . $token);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody());
        return $response->success;
    }

    public static function password_reset_action(Request $request)
    {
        $token = $request->input('token');
        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');
        $resetPass = self::password_reset_post($token, $password, $password_confirmation);

        if ($resetPass->success == false) {
            $request->session();
            return redirect("/password-reset/" . $token)->with('error', $resetPass->message);
        }

        return redirect('/sign-in')->with('success', $resetPass->message);
    }

    public static function password_reset_post($token, $password, $password_confirmation)
    {
        $client = new Client();
        $options = [
            'multipart' => [
                [
                    'name' => 'token',
                    'contents' => $token
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
        $request = new Psr7Request('POST', config('api.base_url') . 'api/auth/password-reset');
        $res = $client->sendAsync($request, $options)->wait();
        $response = json_decode($res->getBody());
        return $response;
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;

class ConfirmationEmailController extends Controller
{
    public static function index($token = false)
    {
        $message = "Email verification link has expired!";
        $status = false;

        if (self::check_token($token)) {
            $message = "Thank you, This email has been confirmed!";
            $status = true;
        }

        return view(
            'auth.confirmation-email',
            [
                'title' => 'confirm email',
                'section' => 'confirm email',
                'data' => [
                    'status' => $status,
                    'message' => $message
                ]
            ]
        );
    }

    public static function index2($token = false)
    {
        // $message = "Email verification link has expired!";
        // $status = false;

        // if (self::check_token($token)) {
        //     $message = "Thank you, This email has been confirmed!";
        //     $status = true;
        // }

        $message = "Thank you, This email has been confirmed!";
        $status = true;

        return view(
            'auth.confirmation-email',
            [
                'title' => 'confirm email',
                'section' => 'confirm email',
                'data' => [
                    'status' => $status,
                    'message' => $message
                ]
            ]
        );
    }

    public static function check_token($token)
    {
        $client = new Client();
        $options = [
            'multipart' => [
                [
                    'name' => 'verification_token',
                    'contents' => $token
                ]
            ]
        ];
        $request = new Psr7Request('POST', config('api.base_url') . 'api/auth/confirmation-email');
        $res = $client->sendAsync($request, $options)->wait();
        $response = json_decode($res->getBody());
        return $response->success;
    }
}

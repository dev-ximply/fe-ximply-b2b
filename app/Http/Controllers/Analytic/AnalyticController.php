<?php

namespace App\Http\Controllers\Analytic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\ErrorHandler\ErrorEnhancer\UndefinedFunctionErrorEnhancer;

class AnalyticController extends Controller
{
    public static function index()
    {
        return view(
            'analytic',
            [
                'title' => 'analytic',
                'section' => 'analytic'
            ]
        );
    }

    public static function webview($user_id)
    {
        return view(
            'analytic-webview',
            [
                'title' => 'analytic',
                'section' => 'analytic',
                'user_id' => $user_id
            ]
        );
    }
}

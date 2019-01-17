<?php

namespace App\Http\Controllers;

use App\Services\SocialAuthenticationService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SocialLoginController extends Controller
{
    use AuthenticatesUsers;

    public function login(SocialAuthenticationService $socialAuth, Request $request)
    {
        return $socialAuth->login($request->has('code'));
    }

    public function handleCallback(SocialAuthenticationService $socialAuth)
    {
        $user = $socialAuth->handleCallback();

        if (Auth::check($user)) {
            return view('home');
        }

        return redirect('auth.register', $user);

    }
}
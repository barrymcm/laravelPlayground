<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    use AuthenticatesUsers;

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(Request $request, $provider)
    {
        $userSocial = Socialite::driver($provider)->user($request->get('state'));
        $user = User::where(['email' => $userSocial->getEmail()])->first();

        if (!$user) {
            return view('auth.register', [
                'name' => $userSocial->getName(),
                'email' => $userSocial->getEmail()
            ]);
        }

        Auth::login($user, true);

        return view('home', ['userSocial' => $userSocial]);
    }
}

<?php


namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthenticationService
{
    public function executeLogin($hasCode, $provider)
    {
        if (!$hasCode) {
            $this->redirectToProvider($provider);
            $this->handleProviderCallback($provider);
        }
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
}
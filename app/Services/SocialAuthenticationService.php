<?php


namespace App\Services;

use App\Repository\UserRepository;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthenticationService
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    private $provider;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->provider = 'github';
    }

    public function login($hasCode)
    {
        if (!$hasCode) {
            return Socialite::driver($this->provider)->redirect();
        }
    }

    public function handleCallback()
    {
        $user = Socialite::driver($this->provider)->user();

        if (isset($user)) {
            $user = $this->tryGetUser($user);
        }

        if (isset($user)) {
            $this->handleUserLogin($user);
        } else {
            return $user;
        }
    }

    private function tryGetUser($user)
    {
        return $this->userRepository->getUserByEmail($user->getEmail());
    }

    private function handleUserLogin($user)
    {
        Auth::login($user,  true);
    }
}
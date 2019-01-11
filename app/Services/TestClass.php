<?php


namespace App;

use App\Http\Middleware\Authenticate;
use Laravel\Socialite\Facades\Socialite;

class TestClassService
{
    /**
     * @var User
     */
    protected $user;
    /**
     * @var Authenticate
     */
    protected $auth;
    /**
     * @var Socialite
     */
    protected $socialite;

    public function __construct(User $user, Authenticate $auth, Socialite $socialite)
    {
        $this->user = $user;
        $this->auth = $auth;
        $this->socialite = $socialite;
    }

}
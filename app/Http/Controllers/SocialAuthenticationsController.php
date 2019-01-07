<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialAuthenticationsController extends Controller
{
    public function auth($provider)
    {
        SocialAuth::author();
    }
}

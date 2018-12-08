<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function create(Request $request)
    {
        return 'this is adding a new message';
    }
}

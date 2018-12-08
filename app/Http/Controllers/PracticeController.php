<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function indexAction()
    {
        return view('index', [
            'title' => request('title')
        ]);
    }
}

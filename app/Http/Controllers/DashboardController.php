<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;
use App\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;

        $user = User::find($userId);

        return view('dashboard', ['listings' => $user->listings]);
    }

    public function trash(Request $request)
    {
        Listing::destroy($request->get('id'));

        return redirect()->back()->with('deleted', 'Listing deleted');
    }
}

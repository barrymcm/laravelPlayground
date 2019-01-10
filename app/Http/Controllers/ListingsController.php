<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ListingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings = Listing::all();

        return view('listings.index', ['listings' => $listings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email'
        ]);

        $listing = new Listing;
        $listing->name = $request->get('name');
        $listing->website = $request->get('website');
        $listing->email = $request->get('email');
        $listing->phone = $request->get('phone');
        $listing->address = $request->get('address');
        $listing->bio = $request->get('bio');
        $listing->user_id = auth()->user()->id;

        $listing->save();

        return redirect()->route('dashboard.index')->with('success', 'Listing Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listing = Listing::find($id);

        return view('listings.show', ['listing' => $listing]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing = Listing::find($id);

        return view('listings.edit', ['listing' => $listing]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Session::flash('status', 'This is a test session message');
        Session::flash('alert', 'success');

        $listing = Listing::find($id);

        $listing->name = $request->get('name');
        $listing->website = $request->get('website');
        $listing->email = $request->get('email');
        $listing->phone = $request->get('phone');
        $listing->address = $request->get('address');
        $listing->bio = $request->get('bio');
        $listing->user_id = auth()->user()->id;

        $listing->save();

        return redirect()->route('dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Listing::destroy($id);
            return redirect()-route('dashboard')->with('success', 'Listing was deleted');
        } catch (QueryException $e) {
            $e->getMessage();
            return redirect()->route('dashboard')->with('failed', 'Listing was not deleted');
        }

    }
}

<?php

namespace App\Http\Controllers;

use App\Album;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::with('Photos')->get();

        return view('albums.index', ['albums' => $albums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');
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
            'cover_image' => 'image|max:1999'
        ]);

        $coverImage = $request->file('cover_image')->getClientOriginalName();

        $file = pathinfo($coverImage, PATHINFO_FILENAME);
        $fileExtension = $request->file('cover_image')->getClientOriginalExtension();
        $fileName = $file . '_'. substr(sha1(rand()), 0, 8). '.' . $fileExtension;

        $request->file('cover_image')->storeAs('public/album_covers', $fileName);

        $album = new Album;
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $fileName;

        $album->save();

        return redirect('/albums')->with('success', 'New album was created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('albums.show')
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

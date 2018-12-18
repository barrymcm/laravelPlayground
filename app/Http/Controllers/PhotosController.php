<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['create']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($albumId)
    {
        return view('photos.create', ['albumId' => $albumId]);
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
            'title' => 'required',
            'photo' => 'image|max:1999'
        ]);

        $photoImage = $request->file('photo')->getClientOriginalName();
        $albumId = $request->input('album_id');

        $file = pathinfo($photoImage, PATHINFO_FILENAME);
        $fileExtension = $request->file('photo')->getClientOriginalExtension();
        $fileName = $file . '_'. substr(sha1(rand()), 0, 8). '.' . $fileExtension;

        $request->file('photo')->storeAs('public/album/'.$albumId, $fileName);

        $photo = new Photo;
        $photo->album_id = $albumId;
        $photo->photo = $fileName;
        $photo->title = $request->input('title');
        $photo->size = $request->file('photo')->getSize();
        $photo->description = $request->input('description');
        $photo->save();

        return redirect('/albums/'.$albumId)->with('success', 'New photo was saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $photo = Photo::find($id);

       return view('photos.show', ['photo' => $photo]);
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
    public function destroy(Request $request)
    {
        Photo::destroy($request->input('id'));
        $albumId = $request->input('album_id');

        session()->flash('success', 'Photo was deleted');
        return redirect("/albums/$albumId");
    }
}

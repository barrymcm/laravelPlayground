@extends('layouts.app')

@section('content')

    <div class="container">
        <table class="table table-striped">
            <tr>
                <th scope="col">Albums</th>
                <th scope="col">Description</th>
                <th scope="col">Pictures</th>
                <th scope="col">Cover Image</th>
            </tr>
            @foreach($albums as $album)
            <tr>
                <td><a href="{{ route('albums.show',  $album->id) }}">{{ $album->name }}</a></td>
                <td>{{ $album->description }}</td>
                <td>
                    <img class="img-thumbnail" src="storage/album_covers/{{ $album->cover_image }}" alt="{{ $album->name }}">
                </td>
                <td>{{ count($album->cover_image) }}</td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection()

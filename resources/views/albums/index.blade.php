@extends('layouts.app')

@section('content')

    <div class="container">
        <table class="table table-striped">
            <tr>
                <th scope="col">Albums</th>
                <th scope="col">Description</th>
                <th scope="col">Images</th>
            </tr>
            @foreach($albums as $album)
            <tr>
                <td><a href="/albums/{{ $album->id }}">{{ $album->name }}</a></td>
                <td>{{ $album->description }}</td>
                <td>{{ $album->cover_image }}</td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection()
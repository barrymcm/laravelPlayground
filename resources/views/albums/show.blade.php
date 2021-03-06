@extends('layouts.app')

@section('content')

    <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif()
        <table class="table table-striped">
            <tr>
                <th scope="col">{{ $album->name }}</th>
                @if(Auth::user('create', $album))
                    <th>
                        <a class="btn btn-primary float-right" href="{{ route('photos.create', $album->id) }}">Upload Photo</a>
                    </th>
                @endif
                <th>
                    <a class="btn btn-outline-secondary float-right" href="{{ route('albums.index') }}">back</a>
                </th>
            </tr>
            @foreach($album->photos as $photo)
                <tr>
                    <td>
                        <a href="/photos/{{$photo->id}}">
                            <img class="img-thumbnail" src="/storage/album/{{ $album->id}}/{{ $photo->photo }}"
                             alt="{{ $photo->name }}">
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection()
@extends('layouts.app')

@section('content')

    <div class="container">
        <table class="table table-striped">
            <tr>
                <th scope="col">{{ $album->name }}</th>
                <th>
                    <a class="btn btn-primary float-right" href="/photos/create/{{ $album->id }}">Upload Photo</a>
                </th>
                <th>
                    <a class="btn btn-outline-secondary float-right" href="">back</a>
                </th>
            </tr>
            {{--@foreach($album as $album)--}}
            {{--<tr>--}}
            {{--<td>--}}
            {{--<img class="img-thumbnail" src="storage/album_covers/{{ $album->cover_image }}" alt="{{ $album->name }}">--}}
                    {{--</td>--}}
                {{--</tr>--}}
            {{--@endforeach--}}
        </table>
    </div>
@endsection()
@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped">
            <tr>
                <th scope="col">{{ $photo->title }}</th>
                <th>
                    <a class="btn btn-outline-secondary float-right" href="/albums/{{ $photo->album_id }}">back</a>
                </th>
                <th>
                    {!! Form::open(['route' => ['photos.destroy', $photo->id], 'onsubmit' => 'Are you sure?']) !!}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::hidden('album_id', $photo->album_id) }}
                        {{ Form::hidden('id', $photo->id) }}
                        {{ Form::bsSubmit('Delete', ['class' => 'btn btn-danger float-right']) }}
                    {!! Form::close() !!}
                </th>
            </tr>

                <tr>
                    <td>
                        <img class="img-thumbnail" src="/storage/album/{{ $photo->album_id }}/{{ $photo->photo }}"
                             alt="{{ $photo->title }}">
                    </td>
                </tr>
        </table>
    </div>
@endsection()
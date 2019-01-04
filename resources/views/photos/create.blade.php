@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add a photo to your album
                        <span class="float-right"><a href="{{ route('albums.show', $albumId) }}" class="btn btn-outline-secondary">Back</a></span>
                    </div>

                    <div class="card-body">
                        <div class="panel-body">
                            {!! Form::open(['route' => ['photos.store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                {{ Form::bsText('title', '', ['placeholder' => 'Photo Name']) }}
                                {{ Form::bsTextArea('description', '', ['placeholder' => 'Album Description']) }}
                                {{ Form::hidden('album_id', $albumId) }}
                                {{ Form::bsFile('photo', ['class' => 'btn btn-primary']) }}
                                {{ Form::bsSubmit('Submit', ['class' => 'btn btn-primary float-right']) }}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
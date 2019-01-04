@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a new album
                        <span class="float-right"><a href="{{ route('albums.index') }}" class="btn btn-outline-secondary">Back</a></span>
                    </div>

                    <div class="card-body">
                        <div class="panel-body">
                            {!! Form::open(['route' => ['albums.store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                {{ Form::bsText('name', '', ['placeholder' => 'Album Name']) }}
                                {{ Form::bsTextArea('description', '', ['placeholder' => 'Album Description']) }}
                                {{ Form::bsFile('cover_image', ['class' => 'btn btn-primary']) }}
                                {{ Form::bsSubmit('Submit', ['class' => 'btn btn-primary float-right']) }}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header panel-heading">Add new category
                        <span class="float-right">
                            <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
                        </span>
                    </div>

                    <div class="card-body">
                        {!! Form::open(['route' => ['categories.store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            {{ Form::bsText('', '', ['placeholder' => 'New category name ...', 'name' => 'title']) }}
                            {{ Form::bsTextArea('', '', ['placeholder' => 'Add a description', 'name' => 'content']) }}
                            {{ Form::bsFile('featured', ['class' => 'btn btn-primary']) }}
                            {{ Form::bsSubmit('Add', ['class' => 'btn btn-success float-right']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()
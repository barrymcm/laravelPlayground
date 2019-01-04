@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header panel-heading">Edit this category
                        <span class="float-right">
                            <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
                        </span>
                    </div>
                    @if(count($errors) > 0)
                        @foreach($errors as $error)
                            {{ $error }}
                        @endforeach
                    @endif
                    <div class="card-body">
                        {!! Form::open(['route' => ['categories.update', $category->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            {{ Form::bsText('title', $category->title, ['placeholder' => 'Edit category name ...', 'name' => 'title']) }}
                            {{ Form::bsTextArea('content', $category->content, ['placeholder' => 'Edit a description', 'name' => 'content']) }}
                            {{ Form::hidden('_method', 'PUT') }}
                            {{ Form::bsSubmit('Update', ['class' => 'btn btn-primary float-right']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()
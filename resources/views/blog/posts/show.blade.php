@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header panel-heading">
                    <h4 class="float-left">{{ $post->name }}</h4>
                    <span class="float-right ">
                            <a href="{{ route('categories.show', $post->category_id) }}"
                               class="btn btn-primary">Back</a>
                    </span>

                    {!! Form::open(['route' => ['posts.destroy', $post->id], 'onsubmit', 'Are you sure?']) !!}
                        {{ Form::hidden('category_id', $post->category_id) }}
                        {{ Form::hidden('_method', 'delete') }}
                        {{ Form::bsSubmit('Delete', ['class' => 'btn btn-danger float-right mr-2']) }}
                    {!! Form::close() !!}
                </div>
                <div class="card-body">
                    <p>
                        {{ $post->name }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()
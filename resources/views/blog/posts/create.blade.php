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
                        {!! Form::open(['route' => ['posts.store'], 'method' => 'POST']) !!}
                            {{ Form::bsText('', '', ['placeholder' => 'Post..', 'name' => 'name']) }}
                            {{ Form::hidden('category_id', $category_id) }}
                            {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
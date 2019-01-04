@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New User
                        <span class="float-right"><a href="{{ route('users.index') }}" class="btn btn-outline-secondary">Back</a></span>
                    </div>
                    <div class="card-body">
                        <div class="panel-body">
                            {!! Form::open(['route' => ['users.store'], 'method' => 'POST']) !!}
                                {{ Form::bsText('name', '', ['placeholder' => 'User Name']) }}
                                {{ Form::bsText('email', '', ['placeholder' => 'Email']) }}
                                {{ Form::label('Admin') }}
                                {{ Form::radio('admin', '1') }}
                                {{ Form::label('User') }}
                                {{ Form::radio('admin', '0', true) }}
                                <div class="form-group">
                                    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) }}
                                </div>
                                {{ Form::bsSubmit('Submit', ['class' => 'btn btn-primary float-right']) }}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
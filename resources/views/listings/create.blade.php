@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Listing
                        <span class="float-right"><a href="/dashboard" class="btn btn-outline-secondary">Back</a></span>
                    </div>
                    <div class="card-body">
                        <div class="panel-body">
                             {!! Form::open(['url' => '/listings']) !!}
                                {{ Form::bsText('name', '', ['placeholder' => 'Company Name']) }}
                                {{ Form::bsText('email', '', ['placeholder' => 'Contact Email']) }}
                                {{ Form::bsText('website', '', ['placeholder' => 'Website']) }}
                                {{ Form::bsText('phone', '', ['placeholder' => 'Contact Phone']) }}
                                {{ Form::bsText('address', '', ['placeholder' => 'Business address']) }}
                                {{ Form::bsTextArea('bio', '', ['placeholder' => 'About this business']) }}
                                {{ Form::bsSubmit('Submit', ['class' => 'btn btn-primary float-right']) }}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
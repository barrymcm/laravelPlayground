@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Listing
                        <span class="float-right"><a href="/dashboard" class="btn btn-outline-secondary">Back</a></span>
                    </div>
                    
                    <div class="card-body">
                        <div class="panel-body">
                            {!! Form::open(['route' => ['listings.update', $listing->id]]) !!}
                            {{ Form::bsText('name', $listing->name , ['placeholder' => 'Company Name']) }}
                            {{ Form::bsText('email', $listing->website , ['placeholder' => 'Contact Email']) }}
                            {{ Form::bsText('website', $listing->email , ['placeholder' => 'Website']) }}
                            {{ Form::bsText('phone', $listing->phone , ['placeholder' => 'Contact Phone']) }}
                            {{ Form::bsText('address', $listing->address , ['placeholder' => 'Business address']) }}
                            {{ Form::bsTextArea('bio', $listing->bio , ['placeholder' => 'About this business']) }}
                            {{ Form::hidden('_method', 'PUT') }}
                            {{ Form::bsSubmit('Update', ['class' => 'btn btn-primary float-right']) }}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
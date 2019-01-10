@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">View Listing
                        <span class="float-right">
                            <a href="{{ route('listings.index') }}" class="btn btn-outline-secondary">Back</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="panel-body">
                            <table class="table table-striped">
                                <tr>
                                    @if (count($listing) > 0)
                                        <tr><td>{{ $listing->name }}</td></tr>
                                        <tr><td>{{ $listing->email }}</td></tr>
                                        <tr><td>{{ $listing->website }}</td></tr>
                                        <tr><td>{{ $listing->phone }}</td></tr>
                                        <tr><td>{{ $listing->address }}</td></tr>
                                        <tr><td>{{ $listing->bio }}</td></tr>
                                    @endif
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (Session::has('status'))
                    <div class="alert alert-{{ Session::get('alert') }}" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header panel-heading">Dashboard
                        <span class="float-right">
                            <a href="{{ route('listings.create') }}" class="btn btn-success btn-xs">Add Listing</a>
                        </span>
                    </div>

                    <div class="card-body">
                        <h3>Listings</h3>
                        @if(count($listings) > 0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Company</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($listings as $listing)
                                    <tr>
                                        <td>{{ $listing->name }}</td>
                                        <td>{{ $listing->email }}</td>
                                        <td><a href="/listings/{{$listing->id}}/edit" class="btn btn-primary">Edit</a></td>
                                        <td>
                                            {!! Form::open(['route' => ["dashboard.trash", $listing->id], 'onsubmit' => 'Are you sure?']) !!}
                                                {{ Form::hidden('_method', 'DELETE') }}
                                                {{ Form::hidden('id', $listing->id) }}
                                                {{ Form::bsSubmit('Delete', ['class' => 'btn btn-danger float-right']) }}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


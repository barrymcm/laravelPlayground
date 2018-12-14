@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header panel-heading">Dashboard</div>
                    <div class="card-body">
                        <h3>Listings</h3>
                        @if(count($listings) > 0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Company</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($listings as $listing)
                                    <tr>
                                        <td>{{ $listing->name }}</td>
                                        <td>{{ $listing->email }}</td>
                                        <td><a href="/listings/{{$listing->id}}" class="btn btn-primary">View</a></td>
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


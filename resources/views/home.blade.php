@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                </div>
                <nav class="col-md-2 d-none d-md-block bg-dark sidebar">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a href="{{ route('listings.index') }}">Listings</a></li>
                        <li class="nav-item"><a href="{{ route('albums.index') }}">Albums</a></li>
                        <li class="nav-item"><a href="{{ route('categories.index') }}">Blog</a></li>
                        <li class="nav-item"><a href="{{ route('users.index') }}">Users</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

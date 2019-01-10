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

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


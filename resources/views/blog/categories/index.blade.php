@extends('layouts.app')

@section('content')
    @if(Session::has('success'))
        toastr.success({{ Session::get('success')}})
    @endif
    <section class="container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header panel-heading">Categories
                            <span class="float-right">
                            <a href="{{ route('categories.create') }}" class="btn btn-primary">New Category</a>
                        </span>
                        </div>

                        <div class="card-body">
                            <ul class="list-group">
                            @foreach($categories as $category)
                                <li class="list-group-item">
                                    <a class="float-left" href="{{ route('categories.show', $category->id) }}">{{ $category->title }}</a>
                                        {!! Form::open(['route' => ['categories.destroy', $category->id], 'onsubmit' => 'Are you sure?']) !!}
                                            {{ Form::hidden('_method', 'delete') }}
                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger float-right']) }}
                                        {!! Form::close() !!}

                                    <a class="btn btn btn-primary float-right mr-5" href="{{ route('categories.edit', $category->id) }}">Edit</a>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>

@endsection()
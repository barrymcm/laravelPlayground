@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header panel-heading">{{ $category->title }}
                        <span class="float-right">
                            <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
                            <a href="{{ route('posts.create', $category->id) }}"
                               class="btn btn-primary">Create a post</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <thead>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col"></th>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->content }}</td>
                                <td>
                                    <img class="img-fluid img-thumbnail"
                                         src="/storage/categories/{{ $category->featured }}" alt="">
                                </td>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td colspan="3">
                                        <a href="{{ route('posts.show', $post->id) }}">{{ $post->name }}</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()
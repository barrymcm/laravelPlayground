@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped">
            <tr>
                <th scope="col">Avatar</th>
                <th scope="col">Name</th>
                <th scope="col">Permissions</th>
                <th scope="col">email</th>
                <th scope="col"><a class="btn btn-success" href="{{ route('users.create') }}">Create User</a></th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>
                        <img class="img-thumbnail" width="150px" height="150px" src="/storage/avatars/{{ $user->profile->avatar }}">
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->admin == 0 ? 'User' : 'Admin' }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection()
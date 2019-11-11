@extends('layouts.app')

@section('content')
    <input type="button" value="Create user" class="btn btn-primary margin" onclick="location.href='/create_user';"/>

    <table class="table text-center">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Rank</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            @if($user->rank != '3')
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->rank}}</td>
                    <td width="190">
                        <form id="delete-form" method="POST">
                            @csrf
                            <input type="button" value="Edit" class="btn btn-primary margin"
                                   onclick="location.href='/create_user/{{$user->id}}' ;"/>
                            <a href="{{ route('delete.user', $user->id) }}">
                                <button type="button" class="btn btn-danger padding">Delete</button>
                            </a>
                        </form>

                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>

    <nav class="blog-pagination">
        {{ $users->links() }}
    </nav>
@endsection

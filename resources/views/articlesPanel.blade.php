@extends('layouts.app')

@section('content')
    <div class="container">
        <input type="button" value="Create article" class="btn btn-primary margin"
               onclick="location.href='/create_article';"/>

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{$article->id}}</td>
                    <td>{{$article->title}}</td>
                    <td>{{$article->category}}</td>
                    <td>{{$article->created_at}}</td>
                    <td>{{$article->updated_at ?? ''}}</td>
                    <td>
                        <form id="delete-form" method="POST">
                            @csrf
                            <input type="button" value="Edit" class="btn btn-primary margin"
                                   onclick="location.href='/create_article/{{$article->id}}' ;"/>
                            <a href="{{ route('delete.article', $article->id) }}">
                                <button type="button" class="btn btn-danger">Delete</button>
                            </a>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <nav class="blog-pagination">
            {{ $articles->links() }}
        </nav>
    </div>
@endsection

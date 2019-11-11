@extends('layouts.app')

@section('content')
    @if($comment->comfirmed != 1)
<div class="container mt-3">
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Comment</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$comment->text}}</td>
                <td width="200">
                    <form id="delete-form" method="POST" action="{{ route('confirm.comment', $comment->id) }}">
                        @csrf
                        <button type="submit" id="confirm" name="confirm" class="btn btn-success margin">Confirm</button>
                        <a href="/">
                            <button type="button" class="btn btn-danger" >Decline</button>
                        </a>
                    </form>

                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection

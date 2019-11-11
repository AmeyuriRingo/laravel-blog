@extends('layouts.app')

@section('content')
    <main role="main" class="container mt-3">
        <div class="row">
            <div class="col-md-12 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    {{$article->category}}
                </h3>

                <div class="blog-post">

                    <div class="d-flex">
                        <div class="card-body d-flex flex-column align-items-start col-md-6 col-sm12">

                            <h2 class="blog-post-title d-block">{{$article->title}}</h2>
                            <p class="blog-post-meta d-block">
                                @if(isset($article->updated_at)) {{date('M, d', strtotime($article->updated_at))}}
                                @else {{date('M, d', strtotime($article->created_at))}}
                                @endif
                            </p>


                            <p>{{$article->title_preview}}</p>
                        </div>
                        {{--                        <div class="col-md-7 col-sm-12">--}}
                        {{--                            <img class="card-img-top flex-auto d-none d-md-block max-size" src='{{$article->image_preview}}'--}}
                        {{--                                 alt="Card image cap">--}}
                        {{--                        </div>--}}
                        <div class="col-sm-12 col-lg-5 col-xl-4 d-flex align-items-center justify-content-center">
                            <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4 ">
                                @if(isset($article->image_preview))
                                    <img class="img-fluid " src="{{$article->image_preview}}" alt="Article image">
                                @endif
                                <a>
                                    <div class="mask rgba-white-slight" style="cursor: default"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    {!! $article->text !!}
                    <hr>
                </div>
                <!-- /.blog-main -->

                <div class="blog-comments">
                    <h3 class="pb-3 mb-4 border-bottom">Comments</h3>
                    <form method="POST" id="add-comment"
                          data-route="{{ route('add.comment', [$article->category, $article->id]) }}">
                        <textarea name="comment" id="comment" class="form-control"></textarea>

                        <div class="d-flex align-items-end justify-content-end">
                            <button type="submit" id="edit" name="edit" class="btn btn-primary mt-2">
                                {{ __('Edit user') }}
                            </button>
                        </div>
                    </form>

                    <div class="container mt-3">
                        <div class="row">
                            @foreach($comments as $comment)
                                <div class="col-md-1">
                                    @if(isset($profile->image))
                                        <img src="{{asset('/uploads/'.$profile->image)}}" class="rounded-circle z-depth-0" alt="avatar image">
                                    @else
                                        <img src="https://www.pinclipart.com/picdir/big/393-3937255_oic-provincial-statistics-officer-psa-maguindanao-user-icon.png" class="rounded-circle z-depth-0 img-fluid" alt="avatar image">
                                    @endif
                                </div>
                                <div class="col-md-11">
                                    <h7 class="font-small font-weight-bold">
                                        {{ $comment->first_name }} {{ $comment->last_name }} {{ $comment->created_at }}
                                    </h7>
                                    <p>
                                        {{ $comment->text }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div><!-- /.blog-comments -->
            </div>
        </div><!-- /.row -->
    </main><!-- /.container -->
@endsection

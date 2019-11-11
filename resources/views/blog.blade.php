@extends('layouts.app')

@section('content')
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
            <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and
                efficiently about what's most interesting in this post's contents.</p>
            <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
        </div>
    </div>

    <div class="container mt-5">


        <!--Section: Content-->
        <section class="mx-md-5 dark-grey-text">

            <!-- Section heading -->
            <h2 class="text-center font-weight-bold mb-4 pb-2">Recent posts</h2>
            <!-- Section description -->
            <p class="text-center mx-auto mb-5">Duis aute irure dolor in reprehenderit in voluptate velit
                esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                culpa
                qui officia deserunt mollit anim id est laborum.</p>

        @foreach($articles as $article)
            <!-- Grid row -->
                <div class="row">
                    <!-- Grid column -->
                    <div class="col-lg-5 col-xl-4">
                        <!-- Featured image -->
                        <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
                            @if(isset($article->image_preview))
                                <img class="img-fluid" src="{{$article->image_preview}}" alt="Article image">
                            @endif
                            <a>
                                <div class="mask rgba-white-slight" style="cursor: default"></div>
                            </a>
                        </div>

                    </div>
                    <!-- Grid column -->
                    <div class="col-lg-7 col-xl-8">
                        <h3 class="font-weight-bold mb-3"><strong>{{$article->category}}</strong></h3>
                        <h4 class="font-weight-bold mb-3"><strong>{{$article->title}}</strong></h4>
                        <p class="dark-grey-text">{{$article->title_preview}}</p>
                        <p>
                            @if(isset($article->updated_at)) {{date('M, d', strtotime($article->updated_at))}}
                            @else {{date('M, d', strtotime($article->created_at))}}
                            @endif
                        </p>
                        <!-- Read more button -->
                        <a class="btn btn-primary btn-md mx-0 btn-rounded"
                           href="/category/{{$article->category}}/{{$article->id}}">Read more</a>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
                <hr class="my-5">
            @endforeach

        </section>
        <!--Section: Content-->
        <nav class="blog-pagination">
            {{ $articles->links() }}
        </nav>
    </div>
@endsection

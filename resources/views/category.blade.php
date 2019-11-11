@extends('layouts.app')

@section('content')
    @foreach($articles as $article)
        <!-- Grid row -->
        <div class="row mt-3">
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
    <nav class="blog-pagination">
        {{ $articles->links() }}
    </nav>
@endsection

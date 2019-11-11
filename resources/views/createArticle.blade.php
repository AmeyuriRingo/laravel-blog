@extends('layouts.app')

@section('content')

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-12 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom mt-3">
                    @if(isset($article))
                        Edit article
                    @else
                        Create article
                    @endif
                </h3>

                <form method="POST" id="createArticle-form" data-route="{{ route('create.article') }}">
                    @csrf
                    <div class="form-group">
                        <label for="title"
                               class="col-md-12 col-form-label text-md-center">{{ __('Article title') }}</label>

                        <div class="col-md-6 offset-md-3">
                            <input id="title" type="text" class="form-control" name="title" @if(isset($article)) value="{{ $article->title }}" @else value="{{ old('title') }}" @endif
                                   required autocomplete="name" autofocus>

                            <span id="title_error" class="invalid-feedback" role="alert"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="title_preview"
                               class="col-md-12 col-form-label text-md-center">{{ __('Article preview') }}</label>

                        <div class="col-md-6 offset-md-3">
                            <input id="title_preview" type="text" class="form-control" name="title_preview"
                                   @if(isset($article)) value="{{ $article->title_preview }}" @else value="{{ old('title_preview') }}" @endif required autocomplete="name" autofocus>

                            <span id="title_preview_error" class="invalid-feedback" role="alert"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image_preview"
                               class="col-md-12 col-form-label text-md-center">{{ __('Image preview') }}</label>

                        <div class="col-md-6 offset-md-3">
                            <input id="image_preview" type="text" class="form-control" name="image_preview"
                                   @if(isset($article)) value="{{ $article->image_preview }}" @else value="{{ old('image_preview') }}" @endif required autocomplete="name" autofocus>

                            <span id="image_preview_error" class="invalid-feedback" role="alert"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category"
                               class="col-md-12 col-form-label text-md-center">{{ __('Category') }}</label>

                        <div class="col-md-2 offset-md-5">
                            <select id="category" name="category" class="form-control">>
                                <option>World</option>
                                <option>Technology</option>
                                <option>Opinion</option>
                                <option>Science</option>
                                <option>Health</option>
                                <option>Style</option>
                                <option>Travel</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="text"
                               class="col-md-12 col-form-label text-md-center">{{ __('Article text') }}</label>

                        <div class="col-md-12">
                            <textarea class="form-control" name="text" id="text">@if(isset($article)){{ $article->text }}@endif</textarea>
                            <span id="text_error" class="invalid-feedback" role="alert"></span>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-7 offset-md-5">
                            <button type="submit" id="createArticle" name="createArticle"
                                    class="padding btn btn-primary">
                                {{ __('Create article') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div><!-- /.blog-main -->
        </div><!-- /.row -->
    </main>
@endsection

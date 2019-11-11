<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blog') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
<div id="app">
    <div class="container">
    <!--Navbar -->
        <nav class="mb-1 navbar navbar-expand-lg navbar-dark secondary-color lighten-1">
            <a class="navbar-brand" href="/">Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent-555"
                    aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item @if($_SERVER['REQUEST_URI'] == '/category/World') active @endif">
                        <a class="nav-link" href="/category/World">World</a>
                    </li>
                    <li class="nav-item @if($_SERVER['REQUEST_URI'] == '/category/Technology') active @endif">
                        <a class="nav-link" href="/category/Technology">Technology</a>
                    </li>
                    <li class="nav-item @if($_SERVER['REQUEST_URI'] == '/category/Opinion') active @endif">
                        <a class="nav-link" href="/category/Opinion">Opinion</a>
                    </li>
                    <li class="nav-item @if($_SERVER['REQUEST_URI'] == '/category/Science') active @endif">
                        <a class="nav-link" href="/category/Science">Science</a>
                    </li>
                    <li class="nav-item @if($_SERVER['REQUEST_URI'] == '/category/Health') active @endif">
                        <a class="nav-link" href="/category/Health">Health</a>
                    </li>
                    <li class="nav-item @if($_SERVER['REQUEST_URI'] == '/category/Style') active @endif">
                        <a class="nav-link" href="/category/Style">Style</a>
                    </li>
                    <li class="nav-item @if($_SERVER['REQUEST_URI'] == '/category/Travel') active @endif">
                        <a class="nav-link" href="/category/Travel">Travel</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item avatar dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->first_name }} <span class="caret"></span>
                                @if(isset($profile->image))
                                <img src="{{asset('/uploads/'.$profile->image)}}"
                                     class="rounded-circle z-depth-0"
                                     alt="avatar image">
                                    @else
                                    <img src="https://www.pinclipart.com/picdir/big/393-3937255_oic-provincial-statistics-officer-psa-maguindanao-user-icon.png"
                                         class="rounded-circle z-depth-0"
                                         alt="avatar image">
                                    @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary"
                                 aria-labelledby="navbarDropdownMenuLink-55">
                                @if (Auth::user()->rank == "3")
                                    <a class="dropdown-item" href="/admin">Admin panel</a>
                                @endif
                                @if (Auth::user()->rank == "2")
                                    <a class="dropdown-item" href="/articles">Articles panel</a>
                                @endif
                                @if (Auth::user()->rank == "1")
                                    <a class="dropdown-item" href="/profile/{{Auth::user()->id}}">Profile</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
        <!--/.Navbar -->
        {{--            <main class="py-4">--}}
        @yield('content')
        {{--        </main>--}}
    </div>
</div>
<!-- Scripts -->
<script src="{{ asset('js/popper.min.js') }}" defer></script>
@if(isset(Auth::user()->rank))
    @if (Auth::user()->rank == "3")
        <script src="{{ asset('js/create_user_form.js') }}" defer></script>
    @endif
    @if (Auth::user()->rank == "1")
        <script src="{{ asset('js/add_comment_form.js') }}" defer></script>
        <script src="{{ asset('js/edit_profile_form.js') }}" defer></script>

    @endif
    @if (Auth::user()->rank == "2")
        <script src="{{ asset('js/create_article_form.js') }}" defer></script>
    @endif
@endif
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- MDB core JavaScript -->
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>--}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.6/holder.min.js"></script>--}}
<script src="{{ asset('js/index.js') }}" defer></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Flixnet') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                @if(Auth::check())
                    @if (Auth::user()->isPremium())
                      <a class="navbar-brand" href="{{ url('/catalog') }}">
                          {{ config('app.name', 'Flixnet') }}
                      </a>
                    @endif
                @endif
                @if(Auth::check())
                    @if (Auth::user()->isAdmin())
                      <a class="navbar-brand" href="{{ url('/catalog') }}">
                          {{ config('app.name', 'Flixnet') }}
                      </a>
                    @endif
                @endif
                @if(Auth::check())
                    @if (Auth::user()->isFree())
                      <a class="navbar-brand" href="{{ url('/catalogfree') }}">
                          {{ config('app.name', 'Flixnet') }}
                      </a>
                    @endif
                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('profile') }}"> My account </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        @if(Auth::check())
                            @if (Auth::user()->isPremium())
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ url('catalog') }}"> Catalog </a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('billing') }}"> Billing </a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ url('invoices') }}"> Invoices </a>
                            </li>
                            @endif
                        @endif
                        @if(Auth::check())
                            @if (Auth::user()->isFree())
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ url('catalogfree') }}"> Catalog </a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('billing') }}"> Billing </a>
                            </li>
                            @endif
                        @endif
                        @if(Auth::check())
                            @if (Auth::user()->isAdmin())
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ url('catalog') }}"> Catalog </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{ url('users') }}"> Admin panel </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{ url('contents') }}"> Video panel </a>
                            </li>
                            @endif
                        @endif
                    </ul>
                    <div style="margin-left:3%;">
                      <form class="form-inline" action="/search" method="get">
                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                      </form>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"></script>

    @yield('scripts')
</body>
</html>

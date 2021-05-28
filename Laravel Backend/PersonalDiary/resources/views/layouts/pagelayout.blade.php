<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Personal Diary') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/sidebar.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/page.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                @guest
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Personal Diary') }}
                </a>
                @else
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Personal Diary') }}
                </a>
                @endguest
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- <li class="nav-item"> -->
                            <a class="nav-link" href="{{ url('/about') }}">
                                About
                            </a>
                        <!-- </li> -->
                       
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <!-- <li class="nav-item"> -->
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                <!-- </li> -->
                            @endif

                            @if (Route::has('register'))
                                <!-- <li class="nav-item"> -->
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                <!-- </li> -->
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        
                    </ul>
                </div>
            </div>
        </nav>
        <div>
        </div>

        <!-- <main class="py-4">
            <div class="sidebar" id="mysidebar">
                <a class="side_accordian" id="posts"><i class="fa fa-chevron-down"></i>&nbsp; Posts</a>
                    <div class="acc_disp">
                        <a href="{{ route('posts.index') }}" id="allPosts">All Posts</a>
                        <a href="" id="newPost">New Post</a> 
                    </div> 
                <a href="">To Do List</a>

                <a href="">Calendar</a> 
            </div> -->

            @hasSection('navigation')
                @yield('navigation')
            @endif

            @yield('content')

            <div class="container">
                <div class="col justify-content-center">
                    {{-- <div class="col-md-8"> --}}
                        @include('pages.messages')
                    {{-- </div> --}}
                </div>
            </div>

        </main>
    </div>
</body>
</html>

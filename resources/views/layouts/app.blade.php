<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['./resources/js/app.js'])
</head>

<body>
    <div id="app">
        <header class="headerHome">
            <nav class="navbar  navbar-expand-md navbar-light shadow-sm bg-dark">
                <div class="container">
                    <img src="{{Vite::asset('resources/img/Logo-Delivebo.png')}}" alt="logo"  class="Logo_filter">
                    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                        <div class="logo_laravel">
                            <h3 class="mx-2" id="font_logo">Deliveboo </h3>
                        </div>
                        {{-- config('app.name', 'Laravel') --}}
                    </a>

                    <button class="navbar-toggler bg-green text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon text-success"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link ms_link" id="font_logo" href="{{url('/') }}">{{ __('Home') }}</a>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <button class=" mx-2 btn_nav rounded-2 p-1">
                                   <a class="text-white text-decoration-none  link_nav" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </button>
                            </li>
                       
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <button class=" mx-2 btn_nav rounded-2 p-1">
                                   <a class="  text-white text-decoration-none  link_nav" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </button>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown green">
                                <a id="navbarDropdown" class="text-white nav-link ms_link dropdown-toggle"  href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item green" href="{{ url('dashboard') }}">{{__('Dashboard')}}</a>
                                    <a class="dropdown-item green" href="{{ url('profile') }}">{{__('Profile')}}</a>
                                    <a class="dropdown-item green" href="{{ route('logout') }}" onclick="event.preventDefault();
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

        @include('components.errors')

        <main class="">
            @yield('content')
        </main>
    </div>
</body>

</html>


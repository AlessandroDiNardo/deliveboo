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
                    <a class="navbar-brand d-flex align-items-center" href="http://localhost:5174/"">
                        <img src="{{Vite::asset('resources/img/Logo-Delivebo.png')}}" alt="logo"  class="Logo_filter">
                        <div class="logo_laravel">
                            <h1>Deliveboo </h1>
                        </div>
                    </a>

                    <button class="navbar-toggler bg-text-success text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon text-success"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <!-- <li class="nav-item">
                                <a class="nav-link ms_link" ="font_logo" href="{{url('/') }}">{{ __('Home') }}</a>
                            </li> -->
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link ms_link font_logo" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                            </li>
                       
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link ms_link font_logo" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown green">
                                <a id="navbarDropdown" class="text-white nav-link ms_link dropdown-toggle"  href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-success" href="{{ url('profile') }}">{{__('Order')}}</a>
                                    <a class="dropdown-item text-success" href="{{ url('profile') }}">{{__('Profile')}}</a>
                                    <a class="dropdown-item text-success" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    @include('components.errors')

        <main class="">
            @yield('content')
        </main>
</body>

</html>


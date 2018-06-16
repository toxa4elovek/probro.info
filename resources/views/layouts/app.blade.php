<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @section('meta')
        <title>ProBro | Главная</title>
    @show

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                ProBro
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">

                    @can('admin-panel')
                        <li class="nav-item">
                            <div class="navbar-hover">
                                <a class="nav-link" href="{{ route('admin.home') }}">
                                    Админка
                                </a>
                            </div>
                        </li>
                    @endcan
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <div class="navbar-hover">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('messages.register') }}</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="navbar-hover">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a>
                        </div>

                    </li>

                    @else
                            <li class="nav-item">
                                <div class="create-post-button">
                                    <a class="nav-link" href="{{ route('cabinet.post.create') }}">
                                        Добавить пост
                                    </a>
                                </div>

                            </li>
                        <li class="nav-item">
                            <div class="navbar-hover">
                                <a id="navbarDropdown" class="nav-link" href="{{ route('cabinet.home') }}">
                                    {{ Auth::user()->name }}
                                </a>
                            </div>

                        </li>
                        <li class="nav-item">
                            <div class="navbar-hover">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('messages.logout') }}
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
        </div>
    </nav>

    <main class="py-4">
        @include('layouts.elements.flash-messages')
        @yield('content')
    </main>
    <div class="footer-block">
        <a href="#">О нас</a>
        <a href="#">Помощь</a>
        <a href="#">Правила</a>
    </div>
</div>


@yield('scripts')

</body>
</html>

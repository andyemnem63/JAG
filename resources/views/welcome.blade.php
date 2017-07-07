<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'trvlrs') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body, html {
            height: 100%;
        }

        .bg {
            background-image: url("{{ asset('img/welcome-fs1.jpg') }}");

            /* Full height */
            height: 100%;

            /* Center and scale the image */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .blanco {
            color: white !important;
        }

        .navbar-default {
            background-color: rgba(255, 255, 255, 0.35);
            border-color: #ffffff;
        }

        .navbar-default .navbar-brand {
            color: #ffffff;
            position: relative;
            top: -6px;
        }

        .navbar-default .navbar-brand:hover,
        .navbar-default .navbar-brand:focus {
            color: #ffffff;
        }

        .navbar-default {
            color: #ffffff;
        }

        .navbar-default .navbar-nav > li > a {
            color: #ffffff;
        }

        .navbar-default .navbar-nav > li > a:hover,
        .navbar-default .navbar-nav > li > a:focus {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.25);
        }

        .navbar-default .navbar-toggle {
            border-color: #ffffff;
        }

        .navbar-default .navbar-toggle:hover,
        .navbar-default .navbar-toggle:focus {
            background-color: rgba(255, 255, 255, 0.25);
        }

        .navbar-default .navbar-toggle .icon-bar {
            background-color: #ffffff;
        }

        .navbar-default .navbar-collapse,
        .navbar-default {
            border-color: rgba(255, 255, 255, 0.5);
        }

        .welcome-logo {
            margin: 8vw 0 4vw 0;
            width: 30vw;
        }

        /*MEDIA QUERIES*/
        /*!* Landscape tablets and medium desktops *!*/
        @media (min-width: 992px) and (max-width: 1199px) {
            .welcome-logo {
                margin: 10vw 0 4vw 0;
                width: 50vw;
            }
        }

        /*!* Portrait tablets and small desktops *!*/
        @media (min-width: 768px) and (max-width: 991px) {
            .welcome-logo {
                margin: 20vw 0 4vw 0;
                width: 50vw;
            }
        }

        /*!* Landscape phones and portrait tablets *!*/
        @media (min-width: 481px) and (max-width: 767px) {
            .welcome-logo {
                margin: 30vw 0 4vw 0;
                width: 70vw;
            }
        }

        /*!* Portrait phones and smaller *!*/
        @media (max-width: 480px) {
            .welcome-logo {
                margin: 30vw 0 4vw 0;
                width: 80vw;
            }
        }

    </style>
</head>
<body class="bg">
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{--{{ config('app.name', 'trvlrs') }}--}}
                    <img src="{{ asset('img/trvlrs-logo.svg') }}" alt="trvlrs logo" height="33px">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Sign In</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row text-center">
            <img src="{{ asset('img/trvlrs-logo.svg') }}" alt="trvlrs logo" class="welcome-logo">
        </div>
        <div class="text-center blanco">
            <h1>Plan an awesome trip together.</h1>
            <p>Get started with trvlrs free group trip planner.</p>
            <br>
            <a href="{{ route('login') }}">
                <button class="btn btn-lg btn-primary text-center">Start Planning Your Trip &nbsp;&nbsp;<i
                            class="glyphicon glyphicon-chevron-right"></i></button>
                {{--<button class="btn btn-lg btn-default">Sign In</button>--}}
            </a>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>




{{--<!doctype html>--}}
{{--<html lang="{{ app()->getLocale() }}">--}}
{{--<head>--}}
    {{--<meta charset="utf-8">--}}
    {{--<meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}

    {{--<title>Laravel</title>--}}

    {{--<!-- Fonts -->--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}

    {{--<!-- Styles -->--}}
    {{--<style>--}}
        {{--html, body {--}}
            {{--background-color: #fff;--}}
            {{--color: #636b6f;--}}
            {{--font-family: 'Raleway', sans-serif;--}}
            {{--font-weight: 100;--}}
            {{--height: 100vh;--}}
            {{--margin: 0;--}}
        {{--}--}}

        {{--.full-height {--}}
            {{--height: 100vh;--}}
        {{--}--}}

        {{--.flex-center {--}}
            {{--align-items: center;--}}
            {{--display: flex;--}}
            {{--justify-content: center;--}}
        {{--}--}}

        {{--.position-ref {--}}
            {{--position: relative;--}}
        {{--}--}}

        {{--.top-right {--}}
            {{--position: absolute;--}}
            {{--right: 10px;--}}
            {{--top: 18px;--}}
        {{--}--}}

        {{--.content {--}}
            {{--text-align: center;--}}
        {{--}--}}

        {{--.title {--}}
            {{--font-size: 84px;--}}
        {{--}--}}

        {{--.links > a {--}}
            {{--color: #636b6f;--}}
            {{--padding: 0 25px;--}}
            {{--font-size: 12px;--}}
            {{--font-weight: 600;--}}
            {{--letter-spacing: .1rem;--}}
            {{--text-decoration: none;--}}
            {{--text-transform: uppercase;--}}
        {{--}--}}

        {{--.m-b-md {--}}
            {{--margin-bottom: 30px;--}}
        {{--}--}}
    {{--</style>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="flex-center position-ref full-height">--}}
    {{--@if (Route::has('login'))--}}
        {{--<div class="top-right links">--}}
            {{--@if (Auth::check())--}}
                {{--<a href="{{ url('/home') }}">Home</a>--}}
            {{--@else--}}
                {{--<a href="{{ url('/login') }}">Login</a>--}}
                {{--<a href="{{ url('/register') }}">Register</a>--}}
            {{--@endif--}}
        {{--</div>--}}
    {{--@endif--}}

    {{--<div class="content">--}}
        {{--<div class="title m-b-md">--}}
            {{--Laravel--}}
        {{--</div>--}}

        {{--<div class="links">--}}
            {{--<a href="https://laravel.com/docs">Documentation</a>--}}
            {{--<a href="https://laracasts.com">Laracasts</a>--}}
            {{--<a href="https://laravel-news.com">News</a>--}}
            {{--<a href="https://forge.laravel.com">Forge</a>--}}
            {{--<a href="https://github.com/laravel/laravel">GitHub</a>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--</body>--}}
{{--</html>--}}
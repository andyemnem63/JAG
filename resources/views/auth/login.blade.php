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

        .panel {
            margin-top: 3vh;
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
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <form role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">Your Email</label>

                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password">Password</label>

                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"
                                               name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-primary">
                                    Sign In
                                </button>
                                <a class="btn btn-block btn-default" href="{{ route('password.request') }}">
                                    Forgot password?
                                </a>
                                <br>
                                <div class="text-center">
                                    <a href="{{ route('register') }}">
                                        No Account? Sign Up for trvlrs
                                    </a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>




{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-md-6 col-md-offset-3">--}}
{{--<div class="panel panel-default">--}}
{{--<div class="panel-body">--}}
{{--<form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">--}}
{{--{{ csrf_field() }}--}}

{{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
{{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>--}}

{{--@if ($errors->has('email'))--}}
{{--<span class="help-block">--}}
{{--<strong>{{ $errors->first('email') }}</strong>--}}
{{--</span>--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
{{--<label for="password" class="col-md-4 control-label">Password</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="password" type="password" class="form-control" name="password" required>--}}

{{--@if ($errors->has('password'))--}}
{{--<span class="help-block">--}}
{{--<strong>{{ $errors->first('password') }}</strong>--}}
{{--</span>--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<div class="col-md-6 col-md-offset-4">--}}
{{--<div class="checkbox">--}}
{{--<label>--}}
{{--<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me--}}
{{--</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<div class="col-md-8 col-md-offset-4">--}}
{{--<button type="submit" class="btn btn-primary">--}}
{{--Login--}}
{{--</button>--}}

{{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--Forgot Your Password?--}}
{{--</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</form>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endsection--}}
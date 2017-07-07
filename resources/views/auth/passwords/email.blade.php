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
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h1>Forgot Your Password?</h1>
                        <p>No problem! Enter your email you use to sign in to trvlrs (and we will send you instructions on how to reset it.</p>
                        <br>

                        <form role="form" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">Your Email</label>

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Send Reset Instructions
                                </button>
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
{{--<div class="col-md-8 col-md-offset-2">--}}
{{--<div class="panel panel-default">--}}
{{--<div class="panel-heading">Reset Password</div>--}}
{{--<div class="panel-body">--}}
{{--@if (session('status'))--}}
{{--<div class="alert alert-success">--}}
{{--{{ session('status') }}--}}
{{--</div>--}}
{{--@endif--}}

{{--<form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">--}}
{{--{{ csrf_field() }}--}}

{{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
{{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>--}}

{{--@if ($errors->has('email'))--}}
{{--<span class="help-block">--}}
{{--<strong>{{ $errors->first('email') }}</strong>--}}
{{--</span>--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<div class="col-md-6 col-md-offset-4">--}}
{{--<button type="submit" class="btn btn-primary">--}}
{{--Send Password Reset Link--}}
{{--</button>--}}
{{--</div>--}}
{{--</div>--}}
{{--</form>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endsection--}}

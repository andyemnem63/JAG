@extends('layouts.splash-layout')


@section('content')

    <div class="container">
        <div class="row text-center">
            <img src="{{ asset('images/trvlrs-logo.svg') }}" alt="trvlrs logo" class="welcome-logo">
        </div>
        <div class="text-center blanco">
            <h1>Plan an awesome trip together.</h1>
            <p>Get started with trvlrs free group trip planner.</p>
            <br>
            @if (Auth::guest())
                <a href="{{ route('login') }}">
                    <button class="btn btn-lg btn-primary text-center">Start Planning Your Trip &nbsp;&nbsp;<i
                                class="glyphicon glyphicon-chevron-right"></i></button>
                </a>
            @else
                <a href="/account">
                    <button class="btn btn-lg btn-primary text-center">Start Planning Your Trip &nbsp;&nbsp;<i
                                class="glyphicon glyphicon-chevron-right"></i></button>
                </a>
            @endif
            <div class="form-group" style="margin-top:5px">
        <!-- Facebook Button -->
                <a class="btn btn-primary" href="{{ url('login/facebook') }}" id="btn-fblogin">
                    <i class="fa fa-facebook"></i> Login with Facebook
                </a>
            </div>
        </div>

        </div>
    </div>

@endsection

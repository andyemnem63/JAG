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
        </div>

        </div>
    </div>

@endsection

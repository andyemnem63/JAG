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
    <link href="{{ asset('css/splash.css') }}" rel="stylesheet">
    <!--FontAwesome-->
    <script src="https://use.fontawesome.com/8eb4ed0827.js"></script>

</head>
<body class="bg">
<div id="app">
    @include('inc.splash-top-nav')
    @yield('content')
</div>
</body>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
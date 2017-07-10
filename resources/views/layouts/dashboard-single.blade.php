<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'trvlrs') }}</title>
    <!--JQuery-->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://file.myfontastic.com/cmbgRkayBnHXSnPo8TJuHj/icons.css" rel="stylesheet">
    <!--FontAwesome-->
    {{--<script src="https://use.fontawesome.com/8eb4ed0827.js"></script>--}}
</head>
<body class="discover-bg">
<div id="app">

    <div class="container-fluid">
        <div class="row">
            @include('inc.dash-side-nav')
            <div class="col-sm-11">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>


<!--Google Maps-->
<script type="text/javascript" src="{{ URL::asset('js/maps.js') }}"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCevUUOwKBB5xPrEyig2d5x3tcmHioGOLY&callback=initMap"></script>
</body>
</html>

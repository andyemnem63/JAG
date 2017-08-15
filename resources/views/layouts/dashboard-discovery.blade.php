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
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="https://file.myfontastic.com/cmbgRkayBnHXSnPo8TJuHj/icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!--FontAwesome-->
    <script src="https://use.fontawesome.com/8eb4ed0827.js"></script>
    {{--<!-- Latest compiled and minified JavaScript -->--}}

    <style>
    /*.modal-content{*/
        /*width: 33%;*/
        /*position: absolute;*/
        /*right: 0;*/
    /*}*/

    /*.modal-content*/
    </style>

</head>

<body>
<div id="app">
    <div class="row">

        <div class="left-pane">
            <!-- side-navbar -->
            @include('inc.dash-side-nav')
        </div>

        <div class="center-pane">
        {{--id="left-column"--}}
        <!-- put content for the left pane here -->
            @yield('leftcontent')
        </div>

        <div class="right-pane">
        {{--id="right-column"--}}
        <!-- put content for the right pane here -->
            @yield('rightcontent')
        </div>

    </div>
</div>

<!-- Scripts -->
<script src="{{ secure_asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/searchUser.js') }}"></script>
<!--JQuery-->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<!--Google Maps-->
<script type="text/javascript" src="{{ URL::asset('js/maps.js') }}"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNfKjepbX3VkJFWOWG5TLmpNGdcaRrsHg&callback=initMap"></script>

</body>
</html>

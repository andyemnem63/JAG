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
    <link href="https://file.myfontastic.com/cmbgRkayBnHXSnPo8TJuHj/icons.css" rel="stylesheet">
</head>
<body>
<div id="app">

    <div class="container-fluid">
        <div class="row">
            @include('inc.navbar')
            <div class="col-sm-11">
                <div class="row">
                    <div class="col-sm-7" id="left-column" style="background-color: lightslategrey">
                        <!-- put content for the left pane here -->
                        @yield('leftcontent')
                    </div>

                    <div class="col-sm-5" id="right-column" style="background-color: lightblue">
                        <!-- put content for the right pane here -->
                        @yield('rightcontent')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/searchUser.js') }}"></script>

</body>
</html>

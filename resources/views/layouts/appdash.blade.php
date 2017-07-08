<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://file.myfontastic.com/cmbgRkayBnHXSnPo8TJuHj/icons.css" rel="stylesheet">
</head>
<body>
    <div id="app">

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-1">
                    <nav class="navbar navbar-default navbar-fixed-side">
                        <!-- normal collapsible navbar markup -->
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Brand</a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="sidebar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="text-center"><a href="#"><i class="trvlrs-calendar"></i></a></li>
                                <li class="text-center"><a href="/invite"><i class="trvlrs-mail"></i></a></li>
                                <li class="text-center"><a href="/discovery"><i class="trvlrs-location"></i></a></li>
                                <li class="text-center"><a href="#"><i class="trvlrs-banknote"></i></a></li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </nav>
                </div>
                <div class="col-sm-11">
                    <!-- your page content -->
                    <div class="row">
                        <div class="col-sm-7" id="left-column" style="background-color: lightslategrey">
                         <!-- Ya'll put shit in here for the left -->
                            @yield('leftcontent')
                        </div>

                        <div class="col-sm-5" id="right-column" style="background-color: lightblue">
                            <!-- Ya'll put shit in here for the right -->
                            @yield('rightcontent')
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

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Polling Units</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
        <style type="text/css">
            .left_bar{
                margin-top:5%;
            }
        </style>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
        <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>
    <body class="antialiased">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <!-- Brand -->
            <a class="navbar-brand" href="#">EBIS</a>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('view-polling-units-results')}}"> Polling Units </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('get-all-results_view')}}">All Polling Units Result</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('save-results-page')}}">Save Results</a>
                </li>
                </ul>
            </div>
            </nav>
            
            <div class="container-fluid left_bar" >
                @yield('content')
            </div>
    </body>
</html>

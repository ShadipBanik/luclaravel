<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">


    <!-- Scripts -->
    <script>
        window.App = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'signedIn' => Auth::check()
        ]) !!};
    </script>

    <style>
        #app{
            padding-bottom: 50px;
        }
        .navbar-default{background-color: #f05f40;color: #fff}
        .navbar-default .navbar-brand {color: white;}
        .btn-submit{background-color: #f05f40; border-color: #f05f40;}
        .level { display: flex; align-items: center; }
        .flex { flex: 1; }
        .mr-1 {margin-right: 1em;}
        [v-cloak] {display: none;}
        .itemsApp{
            padding-top:50px;
        }

    </style>

    @yield('header')

</head>
<body>
<div id="app">
    @include ('layouts.nav')
    <div class="itemsApp">
        @yield('content')
    </div>


    <flash message="{{ session('flash') }}"></flash>

</div>
@include('layouts.footer')
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>
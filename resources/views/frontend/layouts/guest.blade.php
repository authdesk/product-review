<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!--App Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!--Dashboard-->
        <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/plugins/fontawesome/css/fontawesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/plugins/fontawesome/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/feathericon.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/plugins/morris/morris.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}"> 

        <!--App Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

    </head>
    <body class="gray-bg">
        
        @yield('auth_content')


       <!-- Mainly scripts -->
       <script src="{{asset('frontend/js/jquery-3.5.1.min.js')}}"></script>
        <script src="{{asset('frontend/js/popper.min.js')}}"></script>
        <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('frontend/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('frontend/plugins/raphael/raphael.min.js')}}"></script>
        <script src="{{asset('frontend/plugins/morris/morris.min.js')}}"></script>
        <script src="{{asset('frontend/js/chart.morris.js')}}"></script>
        <script src="{{asset('frontend/js/script.js')}}"></script>
    </body>
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

    <head>

        <!-- Meta Data -->
        @include('layouts.partials.meta')

        <!-- Main Theme Js -->
        <script src="{{asset('build/assets/authentication-main.js')}}"></script>

        <!-- Bootstrap 
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        -->
        <link href="{{ asset('build/assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- ICONS CSS -->
        <link href="{{asset('build/assets/icon-fonts/icons.css')}}" rel="stylesheet">

        <!-- APP CSS & APP SCSS -->
        @vite(['resources/sass/app.scss'])

        @yield('styles')

    </head>

	<body class="bg-white">

        <!-- Start Switcher -->
        @include('layouts.components.custom-switcher')
        <!-- End Switcher -->

        @yield('content')

        <!-- Bootstrap JS -->
        <script src="{{asset('build/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        @yield('scripts')

    </body>
    
</html>    

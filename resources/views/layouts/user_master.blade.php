<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

    <head>

        <!-- Meta Data -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="Description" content="Laravel Bootstrap Responsive Admin Web Dashboard Template">
        <meta name="Author" content="Spruko Technologies Private Limited">
        <meta name="keywords" content="laravel template, laravel, laravel admin, admin bootstrap, laravel admin template, dashboard, admin panel template, laravel framework, admin template, laravel admin panel, admin, laravel dashboard, dashboard for laravel, admin panel for laravel, bootstrap admin panel template.">
        
        <!-- Title-->
        <title>{{ config('app.name', 'eKakovost') }}</title>
        
        <!-- Favicon -->
        <link rel="icon" href="/ekakovost.ico" type="image/x-icon">
    
        <!-- Main Theme Js -->
        <script src="{{asset('build/assets/main.js')}}"></script>

        <!-- ICONS CSS -->
        <link href="{{asset('build/assets/icon-fonts/icons.css')}}" rel="stylesheet">

        <!-- Bootstrap 
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        -->
        <link href="{{ asset('build/assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        @include('layouts.components.styles')
      
        <!-- APP CSS & APP SCSS -->
        @vite(['resources/sass/app.scss'])

        @yield('styles')

    </head>

    <body class="">
        @php
            $blade_user = Auth::user(); 
            $blade_active_status = $blade_user->active_status;
            $blade_person = $blade_active_status->person;
        @endphp
        <!-- Switcher -->
        @include('layouts.components.switcher')
        <!-- End switcher -->

        <!-- Loader -->
        <div id="loader" >
            <img src="{{asset('build/assets/images/media/loader.svg')}}" alt="">
        </div>
        <!-- Loader -->

        <div class="page">

            <!-- Main-Header -->
            @include('layouts.components.user_header')
            <!-- End Main-Header -->

            <!--Main-Sidebar-->
            @include('layouts.components.user_sidebar')
            <!-- End Main-Sidebar-->

            <!-- Start::app-content -->
            <div class="main-content app-content">
                <div class="container-fluid">

                    @yield('content')
                    
                </div>
            </div>
            <!-- End::content  -->

            <!-- Footer opened -->
            @include('layouts.components.footer')
            <!-- End Footer -->

            <!-- Country-selector modal -->
            @include('layouts.components.modal')
            <!-- End Country-selector modal -->

            @yield('modals')  

        </div>

        <!-- SCRIPTS -->
        @include('layouts.components.scripts')

        <!-- Sticky JS -->
        <script src="{{asset('build/assets/sticky.js')}}"></script>

        <!-- Custom-Switcher JS -->
        @vite('resources/assets/js/custom-switcher.js')

        <!-- APP JS-->
		@vite('resources/js/app.js')       
        <!-- END SCRIPTS -->

    </body> 

</html>

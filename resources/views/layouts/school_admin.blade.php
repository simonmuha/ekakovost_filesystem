<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head> 

    <link rel="apple-touch-icon" sizes="120x120" href="/app/mydate.png">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/schooladmin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    
    @yield('styles')
</head>



<body>
    @php
        $blade_user = Auth::user(); 
        $blade_active_status = $blade_user->active_status;
        $blade_person = $blade_active_status->person;
    @endphp
    @include('inc.navbar_school_admin')
    @include('inc.help')
    @isset($sidebar)
        @include('inc.sidebar')
    @endif
    <div id="app">
        <div class="container">
            @include('inc.messages')
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
    @php
        $currentUrl = request()->path();
        $app_area = App\Models\App\AppArea::where('app_area_link', $currentUrl)->first();
        if (!$app_area) {
            $app_area = App\Models\App\AppArea::whereRaw('? LIKE CONCAT(app_area_link, "%")', [$currentUrl])->first();
        }
    @endphp
    @isset($app_area) 
        @include('inc.sidebar')
    @else
    @endif
    @include('inc.footer')
    @yield('scripts')
</body>
</html>

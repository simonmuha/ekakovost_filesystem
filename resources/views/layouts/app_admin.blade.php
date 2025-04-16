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
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    
    @yield('styles')
</head>

<style>

*.icon-menu {
    color: red
}

*.icon-on-picture {
    color: red
}
.img-edit {
  position: relative;
}
.img-edit > a {
  position: absolute;
  bottom: 10pt;
  right: 10pt;
}


.btn-light {
  width: 100%;
}
.btn:active,
.active {
  color: black !important;
  background-color: green;
  border-color: blue !important;
}
    .btn.btn-toggle
    {
        cursor:pointer;
        text-transform:lowercase;
        background-color:#727272;
        margin: 6px;
    }
    .btn.btn-toggle:last-of-type
    {
        margin-right:0;
    }
    .btn.btn-toggle:active,
    .btn.btn-toggle.active
    {
        background-color:#7cab66 !important;
    }
    .btn.btn-toggle:active:focus
    {
        box-shadow:none !important;
    }
    .btn:hover:not([disabled]):not(.disabled),
    .btn:focus:not([disabled]):not(.disabled)
    {
        color:#fff;
        -webkit-box-shadow:0 5px 20px 0 rgba(0,0,0,.2);
        -moz-box-shadow:0 5px 20px 0 rgba(0,0,0,.2);
        box-shadow:0 5px 20px 0 rgba(0,0,0,.2);
    }
.vl {
  border-left: 2px solid green;
  height: 500px;
}
.vl1 {
  border-right: 2px solid green;
  height: 500px;
}

.role-button {
    background-color: blue; /* Rdeča barva */
    color: #ffffff; /* Bela barva besedila */
    /* Dodatni slogi po potrebi */
}

</style>

<body>
    @php
        $blade_user = Auth::user();
    @endphp

    @include('inc.navbar_admin') a
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

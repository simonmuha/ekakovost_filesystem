<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

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

    <!-- Styles Sidebar -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/school.css') }}">
</head>

<style>
button.quality-person-role-button {
    padding: 6px 6px; /* Manjša velikost */
    font-size: 14px; /* Manjša pisava */
    cursor: pointer;
    text-align: center;
    color: #fff;
    background-color: #dc3545; /* Rdeča barva za gumb */
    border: none !important; /* Brez roba, dodan !important za zagotovitev prednosti */
    border-radius: 10px; /* Zaobljeni robovi */
    transition: background-color 0.3s; /* Animacija pri hoverju */
}

button.quality-person-role-button:hover {
    background-color: #c82333; /* Temnejša rdeča barva za gumb ob hoverju */
}


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
        $blade_active_status = $blade_user->active_status;
        $blade_person = $blade_active_status->person;
    @endphp
    @include('inc.navbar_school')
    @include('inc.help')

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
</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <link rel="apple-touch-icon" sizes="120x120" href="/app/mydate.png">


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

</head>

<style>
button.quality-person-role-button {
    padding: 8px 16px; /* Manjša velikost */
    font-size: 14px; /* Manjša pisava */
    cursor: pointer;
    text-align: center;
    color: #fff;
    background-color: #dc3545; /* Rdeča barva za gumb */
    border: none !important; /* Brez roba, dodan !important za zagotovitev prednosti */
    border-radius: 20px; /* Zaobljeni robovi */
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
</style>

<body>
    @php
        $blade_user = Auth::user();
    @endphp
    @include('inc.navbar');
    @include('inc.help');
    <div id="app">
        <div class="container">
            @include('inc.messages')
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
    @include('inc.footer')
</body>
</html>

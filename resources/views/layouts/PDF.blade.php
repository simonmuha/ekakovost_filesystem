<!doctype html>
<head> 
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/PDF.css') }}">
    
    @yield('styles')
</head>

<body>
        <div class="content">
            @include('inc.PDF.header') 
                @yield('content')
            <div class="line"></div> <!-- Tukaj dodajte črto -->
            @include('inc.PDF.footer')
        </div>
    @yield('scripts')

</body>
</html>

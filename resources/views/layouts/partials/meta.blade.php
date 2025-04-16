<!-- Meta Data -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="eKakovost - Sistem za ugotavljanje in zagotavljanje kakovosti v izobraževanju">
<meta name="author" content="eKakovost">
<meta name="keywords" content="kakovost, vprašalniki, analiza odgovorov, izobraževanje, evalvacija, eKakovost, spremljanje kakovosti, šolski sistemi">

<!-- Title -->
<title>{{ $title ?? View::yieldContent('title', config('app.name', 'eKakovost - Pot do odličnosti')) }}</title>

<!-- Favicon -->
<link rel="icon" href="/ekakovost.ico" type="image/x-icon">

<!-- Dodatni meta podatki iz podstrani -->
@stack('meta') 

<!-- Open Graph meta podatki -->
<meta property="og:title" content="eKakovost - Sistem za zagotavljanje kakovosti">
<meta property="og:description" content="Orodje za enostavno ustvarjanje vprašalnikov in analizo podatkov za izboljšanje kakovosti izobraževanja.">
<meta property="og:image" content="{{ asset('images/meta-image.png') }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="website">

<!-- Twitter meta podatki -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="eKakovost - Digitalna rešitev za kakovost v šolah">
<meta name="twitter:description" content="Digitalna rešitev za ocenjevanje kakovosti, vprašalnike in analizo podatkov v šolstvu.">
<meta name="twitter:image" content="{{ asset('images/meta-image.png') }}">


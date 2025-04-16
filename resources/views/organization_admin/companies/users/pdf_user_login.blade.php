@extends('layouts.PDF')
@section ('content')
    <address>
        <p>{{ $organization_name }}</p>
        <p>{{ $person_name }} {{ $person_surname }}</p>
    </address>
    <main>
        <p>
            Prijavni podatki za spletno aplikacijo eKakovost. Spletna aplikacija je na naslovu www.ekakovost.com.
        </p>
        <div class="header">
            <h3>Podrobnosti uporabnika:</h3>
        </div>
        <div class="content">
            <p><strong>Ime:</strong> {{ $name }}</p>
            <p><strong>Enaslov:</strong> {{ $email }}</p>
            <p><strong>Geslo:</strong> {{ $user_password_main }}</p>
        </div>
    </main>
@endsection
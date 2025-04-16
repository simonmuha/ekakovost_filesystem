@extends('layouts.PDF')
@section ('content')
    <div class="container">
        <div class="header">
            <h1>Podrobnosti uporabnika</h1>
        </div>
        <div class="content">
            <p><strong>Ime:</strong> {{ $name }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Geslo:</strong> {{ $user_password_main }}</p>
            <hr>
            <p><strong>Organizacija:</strong> {{ $organization_name }}</p>
            <p><strong>Ime:</strong> {{ $person_name }}</p>
            <p><strong>Priimek:</strong> {{ $person_surname }}</p>
        </div>
    </div>

@endsection
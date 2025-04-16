@extends('layouts.user_questionnaire')

@section('content')
<div class="container">
    <h1>Hvala za izpolnjevanje ankete</h1>
    <p>Vaše odgovore smo uspešno shranili. Hvala za vaš čas in trud.</p>
    <a href="{{ url('/home') }}" class="btn btn-primary">Nazaj na domačo stran</a>
</div>
@endsection

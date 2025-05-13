@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Dodaj novo datoteko</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Napake:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('storage.store') }}" enctype="multipart/form-data" class="card shadow p-4">
        @csrf

        {{-- Datoteka --}}
        <div class="mb-3">
            <label class="form-label">Datoteka</label>
            <input type="file" name="file" class="form-control" required>
        </div>

        {{-- Komentar --}}
        <div class="mb-3">
            <label class="form-label">Komentar</label>
            <textarea name="comments" class="form-control" rows="3" placeholder="Poljubne opombe...">{{ old('comments') }}</textarea>
        </div>

        {{-- Tagi --}}
        <div class="mb-3">
            <label class="form-label">Oznake / kategorije</label>
            <select name="tags[]" class="form-select" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        {{-- Datum začetka --}}
<div class="mb-3">
    <label for="valid_from" class="form-label">Velja od</label>
    <input type="date" name="valid_from" id="valid_from" class="form-control" value="{{ old('valid_from', now()->toDateString()) }}">
</div>

{{-- Datum konca --}}
<div class="mb-3">
    <label for="valid_until" class="form-label">Velja do</label>
    <input type="date" name="valid_until" id="valid_until" class="form-control">
</div>

<div class="mb-3">
    <label class="form-label">Dostop</label>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="access" id="accessPrivate" value="private" checked>
        <label class="form-check-label" for="accessPrivate">
            Samo izbranim entitetam
        </label>
    </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="access" id="accessSchool" value="school">
        <label class="form-check-label" for="accessSchool">
            Samo za zaposlene na šoli
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="access" id="accessPublic" value="public">
        <label class="form-check-label" for="accessPublic">
            Javna datoteka (vidna vsem)
        </label>
    </div>


</div>
        {{-- Entitete --}}
        <div class="mb-3">
            <label class="form-label">Entitete za deljenje</label>
            <select name="entities[]" class="form-select" multiple>
                @foreach($entities as $entity)
                    <option value="{{ $entity->id }}">{{ $entity->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Gumb --}}
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Naloži datoteko</button>
        </div>
    </form>
</div>
@endsection

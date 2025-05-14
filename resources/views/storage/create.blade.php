
@extends('layouts.user_master')

@section('styles')

        <!-- Dropzone Css -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/dropzone/dropzone.css')}}">

@endsection

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('users.files.index') }}" class="btn btn-success">
            Nazaj
        </a>
    </div>

    <h1 class="text-center mb-4">Dodaj novo datoteko (OneDrive)</h1>

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

    <form method="POST" action="{{ route('storage.store') }}" class="card shadow p-4">
        @csrf

        {{-- Link do OneDrive datoteke --}}
        <div class="mb-3">
            <label class="form-label">Povezava do datoteke (OneDrive)</label>
            <input type="url" name="file_url" class="form-control" placeholder="https://onedrive.live.com/..." required>
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
            <input type="date" name="start_date" id="valid_from" class="form-control" value="{{ old('start_date', now()->toDateString()) }}">
        </div>

        {{-- Datum konca --}}
        <div class="mb-3">
            <label for="valid_until" class="form-label">Velja do</label>
            <input type="date" name="end_date" id="valid_until" class="form-control">
        </div>

        {{-- Dostop --}}
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
            <button type="submit" class="btn btn-primary">Shrani povezavo</button>
        </div>
    </form>
</div>
@endsection

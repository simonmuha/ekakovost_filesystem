
@extends('layouts.user_master')

@section('styles')

        <!-- Dropzone Css -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/dropzone/dropzone.css')}}">

@endsection

@section('content')
	
                    <!-- Page Header -->
                    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
                        <div>
                            <nav>
                                <ol class="breadcrumb mb-1">
                                    <li class="breadcrumb-item active" aria-current="page">Raziskovalec</li>
                                </ol>
                            </nav>
                            <h1 class="page-title fw-medium fs-18 mb-0">Moje datoteke</h1>
                        </div>
                    </div>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('storage.create') }}" class="btn btn-success">
            + Dodaj datoteko
        </a>
    </div>
                    <!-- Page Header Close -->
<div class="container mt-4">
    <h2 class="mb-3">Datoteke, do katerih imate dostop</h2>
<form method="GET" action="{{ route('users.files.index') }}" class="mb-4 row g-2">
    <div class="col-md-3">
        <label>Dostop:</label>
        <select name="access" class="form-select">
            <option value="">-- Vsi --</option>
            @foreach($accessOptions as $key => $label)
                <option value="{{ $key }}" {{ request('access') == $key ? 'selected' : '' }}>
                    {{ $label }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <label>Oznake:</label>
        <select name="tags[]" class="form-select" multiple>
            <option value="">-- Vsi --</option>
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}" {{ in_array($tag->id, request('tags', [])) ? 'selected' : '' }}>
                    {{ $tag->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <label>Entitete:</label>
        <select name="entities[]" class="form-select" multiple>
            <option value="">-- Vsi --</option>
            @foreach($entities as $entity)
                <option value="{{ $entity->id }}" {{ in_array($entity->id, request('entities', [])) ? 'selected' : '' }}>
                    {{ $entity->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-1 align-self-end">
        <button type="submit" class="btn btn-primary w-100">Filtriraj</button>
    </div>
</form>
    @if($files->isEmpty())
        <div class="alert alert-warning">Ni datotek, do katerih imate trenutno dostop.</div>
    @else
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Ime</th>
                        <th>Dostop</th>
                        <th>Velja od</th>
                        <th>Velja do</th>
                        <th>Entitete</th>
                        <th>Oznake</th>
                        <th>Ogled</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($files as $file)
                        <tr>
                            <td>{{ $file->name }}</td>
                            <td>
                                <span class="badge bg-{{ $file->access === 'public' ? 'success' : ($file->access === 'school' ? 'info' : 'secondary') }}">
                                    {{ ucfirst($file->access) }}
                                </span>
                            </td>
                            <td>{{ $file->start_date ?? '-' }}</td>
                            <td>{{ $file->end_date ?? '-' }}</td>
                            <td>{{ $file->entities->pluck('name')->join(', ') }}</td>
                            <td>{{ $file->tags->pluck('name')->join(', ') }}</td>
                            <td>
                                <a href="{{ $file->url }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                    Ogled
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection

@section('scripts')
	
        <!-- Apex Charts JS -->
        <script src="{{asset('build/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- Dropzone JS -->
        <script src="{{asset('build/assets/libs/dropzone/dropzone-min.js')}}"></script>

        <!-- Internal File Manager JS -->
        @vite('resources/assets/js/file-manager.js')

@endsection

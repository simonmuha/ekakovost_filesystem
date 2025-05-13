@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Seznam datotek</h1>

    {{-- Filter obrazec --}}
    <form method="GET" action="{{ route('storage.index') }}" class="row g-3 mb-4">
        <div class="col-md-3">
            <label class="form-label">Dostop</label>
            <select name="access" class="form-select">
                <option value="">Vse vrste</option>
                <option value="public" {{ request('access') == 'public' ? 'selected' : '' }}>Javne</option>
                <option value="school" {{ request('access') == 'school' ? 'selected' : '' }}>Šolske</option>
                <option value="private" {{ request('access') == 'private' ? 'selected' : '' }}>Zasebne</option>
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label">Oznaka</label>
            <select name="tag_id" class="form-select">
                <option value="">Vse oznake</option>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ request('tag_id') == $tag->id ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label">Entiteta</label>
            <select name="entity_id" class="form-select">
                <option value="">Vse entitete</option>
                @foreach($entities as $entity)
                    <option value="{{ $entity->id }}" {{ request('entity_id') == $entity->id ? 'selected' : '' }}>
                        {{ $entity->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Filtriraj</button>
        </div>
    </form>

    {{-- Tabela --}}
    @if($files->isEmpty())
        <div class="alert alert-info">Ni ustreznih datotek.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Ime</th>
                        <th>Tip</th>
                        <th>Velikost</th>
                        <th>Dostop</th>
                        <th>Oznake</th>
                        <th>Entitete</th>
                        <th>Opombe</th>
                        <th>Datum</th>
                        <th>Prenesi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($files as $file)
                        <tr>
                            <td>{{ $file->name }}</td>
                            <td>{{ $file->filetype }}</td>
                            <td>{{ number_format($file->size / 1024, 1) }} KB</td>
                            <td><span class="badge bg-secondary">{{ $file->access }}</span></td>
                            <td>
                                @foreach($file->tags as $tag)
                                    <span class="badge bg-info text-dark">{{ $tag->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($file->entities as $entity)
                                    <span class="badge bg-light text-dark border">{{ $entity->name }}</span>
                                @endforeach
                            </td>
                            <td>{{ $file->comments ?? '—' }}</td>
                            <td>{{ $file->created_at->format('d.m.Y') }}</td>
                            <td>
                                <a href="{{ route('storage.download', $file) }}" class="btn btn-sm btn-outline-primary">Prenesi</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection

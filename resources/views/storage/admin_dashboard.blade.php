
{{-- @extends('layouts.app') --}}
{{-- @section('content') --}}
<div class="container py-5 max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>

    {{-- ENTITETE --}}
    <div class="mb-12 border rounded p-4">
        <h2 class="text-xl font-semibold mb-2">Dodaj entiteto</h2>
        <form method="POST" action="{{ route('admin.entities.store') }}" class="mb-4">
            @csrf
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Ime entitete" class="border p-2 w-full mb-2" required>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Shrani entiteto</button>
        </form>

        @if($entities->count())
        <h3 class="text-md font-bold mb-2">Obstoječe entitete</h3>
        <ul class="list-disc pl-5 text-sm text-gray-700">
            @foreach($entities as $entity)
                <li>{{ $entity->name }}</li>
            @endforeach
        </ul>
        @endif
    </div>
    
    {{-- UPORABNIK ↔ ENTITETA POVEZAVA --}}
    <div class="mb-12 border rounded p-4">
        <h2 class="text-xl font-semibold mb-2">Poveži uporabnika z entiteto</h2>
        <form method="POST" action="{{ route('admin.user_entity.store') }}" class="mb-4">
            @csrf
            <label for="entity_id" class="block mb-1 font-medium">Izberi entiteto:</label>
            <select name="entity_id" id="entity_id" class="border p-2 w-full mb-2" required>
                <option value="">-- Izberi entiteto --</option>
                @foreach($entities as $entity)
                    <option value="{{ $entity->id }}">{{ $entity->name }}</option>
                @endforeach
            </select>

            <label for="user_id" class="block mb-1 font-medium">Izberi uporabnika:</label>
            <select name="user_id" id="user_id" class="border p-2 w-full mb-2" required>
                <option value="">-- Izberi uporabnika --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Poveži</button>
        </form>
    </div>

    {{-- TAGI --}}
    <div class="mb-12 border rounded p-4">
        <h2 class="text-xl font-semibold mb-2">Dodaj oznako / kategorijo</h2>
        <form method="POST" action="{{ route('admin.tags.store') }}" class="mb-4">
            @csrf
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Ime oznake" class="border p-2 w-full mb-2" required>
            <input type="text" name="description" value="{{ old('name') }}" placeholder="Opis" class="border p-2 w-full mb-2" required>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Shrani</button>
        </form>

        @if($tags->count())
        <h3 class="text-md font-bold mb-2">Obstoječe oznake/kategorije</h3>
        <ul class="list-disc pl-5 text-sm text-gray-700">
            @foreach($tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    {{-- ŠOLSKA LETA --}}
    <div class="mb-12 border rounded p-4">
        <h2 class="text-xl font-semibold mb-2">Dodaj šolsko leto</h2>
        <form method="POST" action="{{ route('admin.years.store') }}" class="mb-4">
            @csrf
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Ime v obliki 2024/25" class="border p-2 w-full mb-2" required>
            <input type="date" name="start" value="{{ old('start_date') }}" class="border p-2 w-full mb-2" required>
            <input type="date" name="end" value="{{ old('end_date') }}" class="border p-2 w-full mb-2" required>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Shrani leto</button>
        </form>

        @if($years->count())
        <h3 class="text-md font-bold mb-2">Obstoječa šolska leta</h3>
        <ul class="list-disc pl-5 text-sm text-gray-700">
            @foreach($years as $year)
                <li>{{ $year->name }}</li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
{{-- @endsection --}}

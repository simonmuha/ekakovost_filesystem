@extends('layouts.school_master')

@section('styles')
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
@endsection

@section('content')
<div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
    <div>
        <nav>
            <ol class="breadcrumb mb-1">
                <li class="breadcrumb-item"><a href="/posts">Prispevki</a></li>
                <li class="breadcrumb-item active" aria-current="page">Uredi prispevek</li>
            </ol>
        </nav>
        <h1 class="page-title fw-medium fs-18 mb-0">Urejanje prispevka</h1>
    </div>
</div>

<form method="POST" action="{{ action('App\Http\Controllers\Posts\PostsController@update', $post->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="post_title">Naslov prispevka</label>
        <input type="text" name="post_title" id="post_title" class="form-control" value="{{ old('post_title', $post->post_title) }}" required>
        @error('post_title')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group mt-3">
        <label for="post_summary">Povzetek</label>
        <textarea name="post_summary" id="post_summary" class="form-control" rows="3">{{ old('post_summary', $post->post_summary) }}</textarea>
        @error('post_summary')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <!-- Ključna misel -->
    <div class="form-group mt-3">
        <label for="post_key_thought">Ključna misel</label>
        <textarea name="post_key_thought" id="post_key_thought" class="form-control" rows="1">{{ old('post_key_thought', $post->post_key_thought) }}</textarea>
        @error('post_key_thought')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <!-- Tema članka -->
    <div class="form-group mt-3">
        <label for="post_topic">Tema članka</label>
        <textarea name="post_topic" id="post_topic" class="form-control" rows="1">{{ old('post_topic', $post->post_topic) }}</textarea>
        @error('post_topic')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group mt-3">
        <label for="post_content">Vsebina</label>
        <textarea name="post_content" id="post_content" class="form-control" rows="6">{{ old('post_content', $post->post_content) }}</textarea>
        @error('post_content')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group mt-3">
        <label for="post_cover_image">Naslovna slika</label>

        @if ($post->post_cover_image)
            <img src="{{ asset('storage/posts/post_cover_image7_1736953398.png') }}" alt="Naslovna slika" class="img-fluid mt-2">
        @endif

        <input type="file" name="post_cover_image" id="post_cover_image" class="form-control">

        @error('post_cover_image')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group mt-3">
        <label for="post_category_id">Kategorija</label>
        <select name="post_category_id" id="post_category_id" class="form-control">
            @foreach ($post_categories as $post_category)
                <option value="{{ $post_category->id }}" {{ $post_category->id == $post->post_category_id ? 'selected' : '' }}>
                    {{ $post_category->post_category_name }}
                </option>
            @endforeach
        </select>
        @error('post_category_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group mt-3">
        <label for="post_tags">Oznake</label>
        <input type="text" name="post_tags" id="post_tags" class="form-control" placeholder="Oznake ločite z vejico" value="{{ old('post_tags', implode(',', $post->tags->pluck('post_tag_name')->toArray())) }}">
        @error('post_tags')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <!-- Čas branja -->
    <div class="form-group mt-3">
        <label for="post_reading_time">Čas branja (v minutah)</label>
        <textarea 
            name="post_reading_time" 
            id="post_reading_time" 
            class="form-control" 
            rows="1">{{ old('post_reading_time', $post->post_reading_time) }}</textarea>
        @error('post_reading_time')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group mt-4">
        <button type="submit" class="btn btn-primary">Shrani spremembe</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Prekliči</a>
    </div>

</form>
@endsection

@section('scripts')
<script>
    ClassicEditor.create(document.querySelector('#post_content')).catch(error => {
        console.error(error);
    });

    document.addEventListener("DOMContentLoaded", function() {
        const input = document.querySelector("#post_tags");
        const existingTags = @json($existingTags); // Vse oznake iz baze

        const tagify = new Tagify(input, {
            whitelist: existingTags,
            dropdown: {
                maxItems: 10,
                enabled: 0,
                closeOnSelect: false,
            }
        });
    });
</script>
@endsection

@extends('layouts.school_master')

@section('styles')
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <!-- Tagify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
@endsection

@section('content')
        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="/posts">Prispevki</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Nov prispevek</li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0"></h1>
            </div>
            <div class="btn-list">
                
            </div>
        </div>
        <!-- Page Header Close -->
        <form method="POST" action="{{ action('App\Http\Controllers\Posts\PostsController@store') }}" enctype="multipart/form-data">
        @csrf
        <!-- Naslov -->
            <div class="form-group">
                <label for="post_title">Naslov prispevka</label>
                <input type="text" name="post_title" id="post_title" class="form-control" value="{{ old('post_title') }}" required>
                @error('post_title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            
            <!-- Povzetek -->
            <div class="form-group mt-3">
                <label for="post_summary">Povzetek</label>
                <textarea name="post_summary" id="post_summary" class="form-control" rows="3">{{ old('post_summary') }}</textarea>
                @error('post_summary')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Ključna misel -->
            <div class="form-group mt-3">
                <label for="post_key_thought">Ključna misel</label>
                <textarea name="post_key_thought" id="post_key_thought" class="form-control" rows="1">{{ old('post_key_thought') }}</textarea>
                @error('post_key_thought')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <!-- Tema članka -->
            <div class="form-group mt-3">
                <label for="post_topic">Tema članka</label>
                <textarea name="post_topic" id="post_topic" class="form-control" rows="1">{{ old('post_topic') }}</textarea>
                @error('post_topic')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            
            <!-- Vsebina -->
            <div class="form-group mt-3">
                <label for="post_content">Vsebina</label>
                <textarea name="post_content" id="post_content" class="form-control" rows="6">{{ old('post_content') }}</textarea>
                @error('post_content')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            
            <!-- Slika -->
            <div class="form-group mt-3">
                <label for="post_cover_image">Naslovna slika <a href="https://www.canva.com/design/DAGcdXi6oP4/EXbRDcjucpln-j_EEH-nFg/edit" target="_blank"> (Canva) </a> </label>
                <input type="file" name="post_cover_image" id="post_cover_image" class="form-control">
                @error('post_cover_image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            
            <!-- Kategorija -->
            <div class="form-group mt-3">
                <label for="post_category_id">Kategorija</label>
                <select name="post_category_id" id="post_category_id" class="form-control">
                    @foreach ($post_categories->where('parent_id', null) as $post_category)
                        <option value="{{ $post_category->id }}">{{ $post_category->post_category_name }}</option>
                        @include('posts.category-options', ['categories' => $post_categories, 'parent_id' => $post_category->id, 'depth' => 1])
                    @endforeach
                </select>
                @error('post_category_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            
            <!-- Oznake -->
            <div class="form-group mt-3">
                <label for="post_tags">Oznake</label>
                <input 
                    type="text" 
                    name="post_tags" 
                    id="post_tags" 
                    class="form-control" 
                    placeholder="Oznake ločite z vejico" 
                    value="{{ old('post_tags') }}">
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
                    rows="1">{{ old('post_reading_time') }}</textarea>
                @error('post_reading_time')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <!-- Gumbi -->
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">Shrani</button>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Prekliči</a>
            </div>
        </form>


        {!! Html::form()->close() !!}
@endsection

@section('scripts')
    <script>
        ClassicEditor.create(document.querySelector('#post_content')).catch(error => {
            console.error(error);
        });
    </script>
        <!-- Tagify JS -->
        <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Najdemo polje za oznake
            const input = document.querySelector("#post_tags");

            // Predloge (pridobljene iz baze ali API-ja)
            const existingTags = @json($existingTags);

            // Inicializiramo Tagify
            const tagify = new Tagify(input, {
                whitelist: existingTags, // seznam obstoječih oznak
                dropdown: {
                    maxItems: 10,         // največ predlaganih oznak
                    enabled: 0,           // vedno prikaži predloge
                    closeOnSelect: false, // naj ostane odprto po izbiri
                },
                originalInputValueFormat: values => values.map(tag => tag.value).join(','), // Pretvori v niz z vejicami
            });
        });
    </script>
@endsection

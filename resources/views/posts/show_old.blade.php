@extends('layouts.school_master')

@section('content')
    <div class="container">
        <h1>{{ $post->post_title }}</h1>
        <p><strong>Kategorija:</strong> {{ $post->category->post_category_name }}</p>
        <p><strong>Avtor:</strong> {{ $post->author->name }}</p>
        <p><strong>Datum objave:</strong> {{ $post->post_published_at }}</p>

        @if ($post->post_cover_image)
            <img src="{{ asset('storage/posts/' . $post->post_cover_image) }}" alt="Naslovna slika" class="img-fluid mb-4">
        @endif

        <h3>Kratek povzetek:</h3>
        <p>{{ $post->post_summary }}</p>

        <h3>Vsebina:</h3>
        <div>{!! $post->post_content !!}</div>

        <h3>Oznake:</h3>
        <ul>
            @foreach ($post->tags as $tag)
                <li>{{ $tag->post_tag_name }}</li>
            @endforeach
        </ul>

        <h3>Komentarji:</h3>
        <ul>
            @foreach ($post->comments as $comment)
                <li>{{ $comment->post_comment_content }} - <em>{{ $comment->user->name }}</em></li>
            @endforeach
        </ul>

        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Nazaj</a>
    </div>
@endsection

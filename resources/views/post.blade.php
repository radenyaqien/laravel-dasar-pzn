@extends('layouts.main')
@section('container')
    <article class="mb-5">
        <h2>
            {{ $post->title }}
        </h2>
        <p>by <a  class="text-decoration-none" href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
        {!! $post->body !!}

    </article>
    <a href="/blog">Back To Blog</a>
@endsection

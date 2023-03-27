@extends('layouts.main')
@section('container')
    <div class="col">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-4">
                    {{ $post->title }}
                </h1>
                <p>by <a class="text-decoration-none"
                        href="/blog?author={{ $post->author->username }}">{{ $post->author->name }}</a> in
                    <a href="/blog?categories={{ $post->category->slug }}">{{ $post->category->name }}</a>
                </p>
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
                <article class="fs-5 my-3">
                    {!! $post->body !!}
                </article>
                
                <a class="d-block mt-3" href="/blog">Back To Blog</a>
            </div>
        </div>
    </div>
@endsection

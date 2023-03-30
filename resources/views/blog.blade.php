@extends('layouts.main')

@section('container')
    <h1 class="mb-3 text-center">{{ $title }}</h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/blog" method="get">
                <div class="input-group mb-3">
                    <input type="hidden" name="category" value="{{ request('category') }}">
                    <input type="hidden" name="author" value="{{ request('author') }}">
                    <input type="text" name="search" class="form-control" placeholder="Search..."
                        aria-label="Search...." aria-describedby="basic-addon2" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
        <div class="card mb-3">

            @if ($posts->first()->image)
                <div style="max-height: 350px;overflow: hidden">
                    <img src="{{ asset('storage/post-img/' . $posts->first()->image) }}" alt="{{ $posts->first()->category->name }}"
                        class="img-fluid">
                </div>
            @else
              
            <img src="https://source.unsplash.com/1200x400?{{ $posts->first()->category->name }}" class="card-img-top"
            alt="{{ $posts->first()->category->name }}">
            @endif

            <div class="card-body text-center">
                <h3 class="card-title"><a class="text-decoration-none text-dark"
                        href="/posts/{{ $posts->first()->slug }}">{{ $posts->first()->title }}
                    </a></h3>
                <p>
                    <small>by
                        <a class="text-decoration-none"
                            href="/blog?author={{ $posts->first()->author->username }}">{{ $posts->first()->author->name }}</a>
                        in
                        <a class="text-decoration-none"
                            href="/blog?category={{ $posts->first()->category->slug }}">{{ $posts->first()->category->name }}
                        </a> {{ $posts->first()->created_at->diffForHumans() }}
                    </small>
                </p>
                <p class="card-text">{{ $posts->first()->excerpt }}</p>
                <a class="text-decoration-none btn btn-primary" href="/posts/{{ $posts->first()->slug }}">Read more</a>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="position-absolute px-3 py-2 rounded" style="background-color: rgba(0, 0, 0, 0.7)"><a
                                    class="text-white text-decoration-none"
                                    href="/blog?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                            </div>

                            @if ($post->image)
                                <div style="max-height: 350px;overflow: hidden">
                                    <img src="{{ asset('storage/post-img/' . $post->image) }}"
                                        alt="{{ $post->category->name }}" class="img-fluid">
                                </div>
                            @else
                                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                                    alt="{{ $post->category->name }}" class="img-fluid">
                            @endif

                            <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top"
                                alt="{{ $post->category->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p>by <a href="/blog?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                                    {{ $post->created_at->diffForHumans() }}
                                </p>
                                <p class="card-text">{{ $post->excerpt }}</p>
                                <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">No Posts Found</p>
    @endif

    {{ $posts->links() }}
@endsection

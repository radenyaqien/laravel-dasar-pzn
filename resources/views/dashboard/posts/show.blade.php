@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-4">
                    {{ $post->title }}
                </h1>
               
                <a class="btn btn-success" href="/dashboard/posts"> <span data-feather="arrow-left"></span> Back to My Posts</a>
                <a class="btn btn-warning" href="/dashboard/posts"> <span data-feather="edit"></span> Edit Post</a>
                <a class="btn btn-danger" href="/dashboard/posts"> <span data-feather="x-circle"></span> Delete Post</a>

                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
                <article class="fs-5 my-3">
                    {!! $post->body !!}
                </article>
            </div>
        </div>
    </div>
@endsection

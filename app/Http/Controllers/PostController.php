<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {

        $blog_posts = Post::with(['author','category'])->latest()->get();
        return view('blog', [
            "title" => "All Posts",
            "active" => "posts",
            "posts" => $blog_posts
        ]);
    }

    public function show(Post $post)
    {

        return view('post', [
            "title" => "Single Post",
            "active" => "posts",
            "post" => $post
        ]);
    }
}

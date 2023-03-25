<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {

        $blog_posts = Post::all();
        return view('blog', [
            "title" => "Blog",
            "posts" => $blog_posts
        ]);
    }

    public function show(Post $post)
    {
        
        return view('post', [
            "title" => "Single Post",
            "post" => $post
        ]);
    }
}

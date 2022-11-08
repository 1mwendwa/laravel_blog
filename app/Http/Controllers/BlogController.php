<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Posts;

class BlogController extends Controller
{
    public function getsingle($slug)
    {
        $post=Posts::where('slug', '=', $slug)->first();

        return view('blog.single', compact('post'));
    }

    public function index()
    {
        $posts=Posts::orderBy('id', 'desc')->paginate(5);

        return view('blog.index', compact('posts'));
    }
}

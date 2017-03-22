<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index() {
        return view('posts.index');
    }
    public function show($post) {
        return view('posts.show');
    }
    public function create() {
        return view('posts.create');
    }
    public function store() {
        Post::create([
            'title' => request('title'),
            'body' => request('body')
        ]);
        return redirect('/');
    }
}

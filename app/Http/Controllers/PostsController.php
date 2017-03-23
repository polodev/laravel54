<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['only' => 'create']);
    }
    public function index() {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }
    public function show(Post $post) {
        return view('posts.show', compact('post'));
    }
    public function create() {
        return view('posts.create');
    }
    public function store() {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);
        auth()->user()->publishPost(
            new Post(request(['title', 'body']))
        );
//        Post::create([
//            'title' => request('title'),
//            'body' => request('body'),
//            'user_id' => auth()->id()
//        ]);
        return redirect('/');
    }
}

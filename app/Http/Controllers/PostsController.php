<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['only' => 'create']);
    }
    public function index() {
        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();
        $archives =
            Post::selectRaw('year(created_at) as year, monthname(created_at) as month, count(*) as published')
                ->groupBy('year', 'month')
                ->get()
                ->toArray();
        return view('posts.index', compact('posts', 'archives'));
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

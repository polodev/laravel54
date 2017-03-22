<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Post $post) {
        $post->createComment(request('body'));
        return back();
    }
}

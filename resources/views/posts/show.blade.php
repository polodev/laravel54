@extends('layouts.master')
@section('content')
    <div class="blog-post">
        <h2 class="blog-post-title"> {{ $post->title }} </h2>
        <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }}</p>
        <p>{{ $post->body }}</p>
        <ul class="list-item">
            @foreach($post->comments as $comment)
                <li class="list-group-item">
                    {{ $comment->created_at->diffForHumans() }}
                    {{ $comment->body }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection

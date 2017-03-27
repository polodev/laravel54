@extends('layouts.master')
@section('content')
    <div class="blog-post">
        <h2 class="blog-post-title"> {{ $post->title }} </h2>
        @if(count($post->tags))
            <ul>
                @foreach($post->tags as $tag)
                    <li>{{ $tag->name }}</li>
                @endforeach
            </ul>
        @endif
        <p class="blog-post-meta">
            {{ $post->created_at->toFormattedDateString() }} by {{ $post->user->name }}
        </p>
        <p>{{ $post->body }}</p>
        <hr>
        <ul class="list-item">
            @foreach($post->comments as $comment)
                <li class="list-group-item">
                    {{ $comment->created_at->diffForHumans() }} <br>
                    {{ $comment->user->name }} :
                    {{ $comment->body }}
                </li>
            @endforeach
        </ul>
        @if(auth()->check())
            <div class="card">
                <div class="card-block">
                    <form action="/posts/{{ $post->id }}/comments" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea placeholder="Enter your comment here" name="body" id="body" class="form-control" required> </textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary">
                        </div>
                        @include('layouts.errors')
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection

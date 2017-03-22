@extends('layouts.master')
@section('content')
    <form action="{!! route('postStore') !!}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="title" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" id="body" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Publish</button>
        @include('layouts.errors')
    </form>
@endsection
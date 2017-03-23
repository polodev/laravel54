@extends('layouts.master')
@section('content')
    <form method="post" action="/register">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" class="form-control" name="password">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Password Confirmation</label>
            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
        @include('layouts.errors')
    </form>
@endsection
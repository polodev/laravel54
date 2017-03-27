<?php
//App::singleton('App\Billing\Stripe', function () {
//    return new \App\Billing\Stripe(config('services.stripe.key'));
//});
//
//$stripe = App::make('App\Billing\Stripe');
//$stripe = resolve('App\Billing\Stripe');
//$stripe = app('App\Billing\Stripe');
//dd($stripe);

Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/tags/{tag}', 'TagsController@index')->name('tag');
Route::get('/home', 'PostsController@index')->name('home');
Route::get('posts/create', 'PostsController@create');
Route::post('posts', 'PostsController@store')->name('postStore');
Route::get('posts/{post}', 'PostsController@show');
Route::post('posts/{post}/comments', 'CommentsController@store');

//auth
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
Route::get('/register', 'RegistrationsController@create');
Route::post('/register', 'RegistrationsController@store');


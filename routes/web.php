<?php

Route::get('/', 'PostsController@index')->name('postHomePage');
Route::get('posts/create', 'PostsController@create');
Route::post('posts', 'PostsController@store')->name('postStore');
Route::get('posts/{post}', 'PostsController@show');


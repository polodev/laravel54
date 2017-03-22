<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    public function comments() {
        return $this->hasMany(Comment::class);
    }
    public function createComment($body) {
//        Comment::create([
//            'body' => $body,
//            'post_id' => $this->id
//        ]);
//        $this->comments()->create(compact('body'));
        $this->comments()->create(['body' => $body]);
    }
}

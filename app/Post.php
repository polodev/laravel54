<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    public function comments() {
        return $this->hasMany(Comment::class);
    }
    public function user() {
        return $this->belongsTo(User::Class);
    }
    public function createComment($body) {
//        Comment::create([
//            'body' => $body,
//            'post_id' => $this->id
//        ]);
//        $this->comments()->create(compact('body'));
        $this->comments()->create([
            'body' => $body,
            'user_id' => auth()->id()
        ]);
    }

    public function scopeFilter($query, $filters) {
        if($month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }
        if ($year = $filters['year']) {
            $query->whereYear('created_at', Carbon::parse($year)->year);
        }
    }

}

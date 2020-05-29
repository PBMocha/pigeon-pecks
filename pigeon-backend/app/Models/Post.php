<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title', 'body', 'user_id', 'image_id', 'likes'];

    //TODO: Create relationship with users
    public function user() {
        return $this->belongsTo(User::class);
    }

    //TODO: Create relationship with profile
    public function profile() {
        $this->belongsTo(User::class);
    }

    //TODO: Create relationship with comments
    public function comments() {
        return $this->hasMany(Comment::class);
    }

}

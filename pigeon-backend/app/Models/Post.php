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

    /**
     * Get all users that liked this post
     */
    public function likedByUsers() {
        return $this->belongsToMany(User::class, 'liked_posts')->withTimestamps();
    }

    //TODO: Create relationship with comments
    public function comments() {
        return $this->hasMany(Comment::class);
    }

}

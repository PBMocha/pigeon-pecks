<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    //protected $table = "users"

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts() {
        return $this->hasMany(Post::class);
    }

    /**
     * get the users that like this post
     */
    public function likedPosts() {
        return $this->belongsToMany(Post::class, 'liked_posts')->withTimestamps();
    }
    // public function profile() {
    //     return $this->hasOne(Profile::class);
    // }

    public function comment() {
        return $this->hasMany(Comment::class);
    }

    /**
     * Represents all the users this user is following
     */
    public function followings() {
        return $this->belongsToMany(User::class, 'followers', 'follower', 'following');
    }

    /**
     * Represents all the users that follow this user
     */
    public function followers() {

        // ("Model type that belongs to", 'table', '')
        return $this->belongsToMany(User::class, 'followers', 'following', 'follower');
    }

}

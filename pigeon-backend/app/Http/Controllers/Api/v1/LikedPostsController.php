<?php

namespace App\Http\Controllers\Api\v1;

use App\Events\PostLiked;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LikedPostsController extends Controller
{
    //


    public function __construct()
    {

    }

    /**
     *  Displays authenticated users liked posts
     *
     *
     */
    public function index() {
        $user = Auth::user();
        $posts = $user->likedPosts()->get(); // or $user->likedPosts
        return response()->json(['liked-posts' => $posts]);
    }

    public function likePost(Post $post) {

        //Find the post the user likes
        $user = Auth::user();
        $user->likedPosts()->attach($post); // Attach the post the user liked

        //Fire off event to notify LikeListener
        event(new PostLiked($post));

        return response()->json(['posts'=> $user->likedPosts]);
    }

    // Undo a like on a post
    public function unlikePost(Post $post) {

        $user = Auth::user();
        $user->likedPosts()->detach($post); // Attach the post the user liked
        return response()->json(['posts'=> $user->likedPosts]);
    }
}

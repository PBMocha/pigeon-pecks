<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LikedPostsController extends Controller
{
    //

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

    public function likePost($post) {

        //Find the post the user likes
        $postToLike = Post::findOrFail($post);
        $user = Auth::user();
        $user->likedPosts()->attach($post); // Attach the post the user liked

        return response()->json(['posts'=> $user->likedPosts]);
    }

    // Undo a like on a post
    public function unlikePost($post) {

        $postToLike = Post::findOrFail($post);
        $user = Auth::user();
        $user->likedPosts()->detach($post); // Attach the post the user liked
        return response()->json(['posts'=> $user->likedPosts]);

    }
}

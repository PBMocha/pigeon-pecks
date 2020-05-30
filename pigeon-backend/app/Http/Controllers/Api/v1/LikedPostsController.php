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
     *
     *
     *
     */
    public function index() {
        $user = Auth::user();
        $posts = $user->likedPosts;
        return response()->json(['posts' => $posts]);
    }

    public function likePost(Request $request, Post $post) {

        //Get authenticated user


        $postToLike = Post::findOrFail($post->id);
        $user = Auth::user();
        $user->likedPosts()->attach($post);

        return response()->json(['posts'=> $user->likedPosts]);
    }
}

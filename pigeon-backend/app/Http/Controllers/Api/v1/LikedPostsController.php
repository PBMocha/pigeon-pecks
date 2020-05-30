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
        $posts = $user->likedPosts();
        return response()->json(['posts' => $posts]);
    }

    public function likePost(Request $request, $post) {

        //Find the post the user likes
        $postToLike = Post::findOrFail($post);
        $user = Auth::user();
        $user->likedPosts()->attach($post); // Attach the post the user liked

        return response()->json(['posts'=> $user->likedPosts]);
    }
}

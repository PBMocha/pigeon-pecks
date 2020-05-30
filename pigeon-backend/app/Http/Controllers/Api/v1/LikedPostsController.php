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
        $user = User::findOrFail(Auth::id());

        $posts = $user->likedPosts()->all();
        return response()->json(['posts' => $posts]);
    }

    public function likePost(Request $request, Post $post) {

        //Get authenticated user
        $user = $request->user();

        $likePost = Post::findOrFail($post);



    }
}

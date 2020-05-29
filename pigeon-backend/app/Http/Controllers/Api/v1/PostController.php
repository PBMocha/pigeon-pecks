<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{

    public function show($id) {
        $post = Post::findOrFail($id);
        return response()->json([ 'post' => $post ]);
    }

    //Get all posts by a specific user
    public function postsByUser($user) {

        //Not sure if this is the best way to get all posts from a user

        //$user = Auth::user();

        $posts = Post::where('user_id', $user)->get();// GET all posts by this user
        //$posts = $user->posts->all();

        return response()->json(['post' => $posts]);
    }

    public function store(Request $request) {

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'image_id' => $request->image_id,
            'user_id' => Auth::Id(),
            'likes' => 0
        ]);

        return response()->json(['post' => $post, 'user' => Auth::user() ], 200);
    }


}

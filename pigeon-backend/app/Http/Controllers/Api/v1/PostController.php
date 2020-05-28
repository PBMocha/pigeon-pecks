<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    //

    public function index(Request $id) {

        $user = User::find($id);
        $posts = $user->posts()->all(); // GET all posts by this user

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

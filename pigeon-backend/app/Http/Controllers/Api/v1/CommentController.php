<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    //
    public function __construct() {

    }

    public function index(Post $post) {

        $comments = $post->comments();

        return response()->json(['comments' => $comments]);
    }

    public function store(CommentRequest $request, Post $post) {

        $comment = Comment::create($request);

        return response()->json(['comment' => $comment], 200);
    }
}

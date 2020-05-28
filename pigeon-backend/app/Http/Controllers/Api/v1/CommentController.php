<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class CommentController extends Controller
{
    //
    public function __construct() {

    }

    public function index(Request $request, Post $post) {

        $comments = $post->comments();

        return response()->json(['comments' => $comments]);
    }

    public function store(Request $request, Post $post) {



    }
}

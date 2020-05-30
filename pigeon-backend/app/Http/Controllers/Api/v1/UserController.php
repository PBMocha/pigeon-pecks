<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index() {

        return response()->json(['user'=> Auth::user()]);
    }

    public function userPosts() {
        return response()->json(['posts' => Auth::user()->posts]);
    }
}

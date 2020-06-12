<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    //
    public function __construct()
    {

    }

    public function index(User $user)
    {

        $followers = $user->followers;

        return response()->json(['followers' => $followers]);
    }

    public function following() {

    }

    public function follow(User $user)
    {
        $auth_user = Auth::user();

        if ($user == $auth_user) {
            return response()->json(['message'=> 'Not allowed to follow yourself'], 500);
        }
        $success = $auth_user->following()->attach($user);

        return response()->json(['success'=> $auth_user->following]);

    }

    public function unfollow() {

    }

}

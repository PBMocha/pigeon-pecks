<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    //

    public function __construct() {

    }

    public function login(Request $request) {

        $credentials = $request->validate([
            'email' => 'email|required',
            'password' => 'required|string'
        ]);

        if(!Auth::attempt($credentials)) {
            return response([ 'message' => 'Invalid Credentials' ], 401);
        }

        $user = Auth::user(); //User::findOrFail(Auth::id());

        //$user = Auth::user();
        //Giving me a linter error idk why
        $accessToken = $user->createToken('apiToken')->accessToken;

        return response(['user' => Auth::user(), 'token' => $accessToken]);
    }

    public function logout(Request $request) {

        $user = Auth::user();
        $success = $user->token()->revoke();
        return response()->json(['success' => 'Logged out' ] ,200);
    }
}

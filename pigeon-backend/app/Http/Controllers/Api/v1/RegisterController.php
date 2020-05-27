<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class RegisterController extends Controller
{
    //
    public function __construct()
    {

    }

    public function register(Request $request) {

        //Validate request

        $validate = $request->validate([
            'name' => 'required|string|unique:App\User,name',
            'email' => 'required|email|unique:App\User,email',
            'password' => 'required|password:api',
            'c_password' => 'required|same:password',
        ]);

        if ($validate->fails()) {
            return response()->json(['error'=>$validate->errors()], 401);
        }

        $user = User::create([
            'name' => $validate->name,
            'email' => $validate->email,
            'password' => Hash::make($validate->password),
        ]);

        $accessToken = $user->createToken('apiToken')->accessToken;

        return response()->json(['user' => $user, 'token' => $accessToken]);

    }
}

<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\COntracts\Validation\Validator;


class RegisterController extends Controller
{
    //
    public function __construct()
    {

    }

    public function register(Request $request) {

        //Validate request

        $validate = validator($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        //return response()->json($validate->all());

        if ($validate->fails()) {
            return response()->json(['error'=>$validate->errors()], 401);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $accessToken = $user->createToken('apiToken')->accessToken;

        return response()->json(['user' => $user, 'token' => $accessToken]);

    }
}

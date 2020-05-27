<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\User;
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

        //return response()->json(['test'=>'if it finds this controller']);

        //return response()->json($request->all());

        //There was problem with request validation, prevented response
        $validate = validator($request->all(), [
            'name' => 'required|string|unique:App\User,name',
            'email' => 'required|email|unique:App\User,email',
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

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::prefix('/user')->group(function() {

    Route::post('/login', 'Api\v1\LoginController@login');
    Route::post('/register', 'Api\v1\RegisterController@register');

    //
    // Route::get('/post', 'Api/v1/PostsController@index');
    // Route::post('/post')
    // Route::get('/posts/{post}', 'Api/v1/PostsConrtoller@show');

});

Route::group(['middleware' => 'auth:api'], function () {

});

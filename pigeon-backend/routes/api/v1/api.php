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


//Routes related to logged
Route::prefix('/user')->group(function() {

    Route::post('/login', 'Api\v1\LoginController@login');
    Route::post('/register', 'Api\v1\RegisterController@register');

    //Will change this later
    Route::get('/{user}/posts', 'Api\v1\PostController@postsByUser');

    Route::group(['middleware' => ['auth:api']], function () {

        Route::get('/logout', 'Api\v1\LoginController@logout');

        Route::get('/profile', 'Api\v1\UserController@index');
        Route::put('/profile/edit', 'Api\v1\ProfileController@edit');

        Route::post('/post', 'Api\v1\PostController@store');
        Route::get('/posts', 'Api\v1\UserController@userPosts'); // GET all posts authenticated by user
        Route::get('/liked-posts', 'Api\v1\LikedPostsController@index'); // GET all posts liked by authneticated user
        Route::post('/post/{id}/comment', 'Api\v1\CommentController@store'); // endpoint to store a comment on a post
        Route::post('/post/{id}/like', 'Api\v1\LikedPostsController@likePost'); // endpoint to incmrement a like on a post


        // Route::get('/posts/{post}', 'Api/v1/PostsConrtoller@show');
    });
});

//Public resources that can be accessed
Route::get('/posts', 'Api\v1\PostController@index');
Route::get('/posts/{id}', 'Api\v1\PostController@show');
Route::get('/posts/{id}/comments', 'Api\v1\CommentController@index'); //




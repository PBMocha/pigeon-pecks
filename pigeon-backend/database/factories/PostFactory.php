<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->sentence,
        'body' => $faker->paragraph(20),
        'user_id' => App\Models\User::all()->random(),
        'image_id' => $faker->randomNumber,
    ];
});

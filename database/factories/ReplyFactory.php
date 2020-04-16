<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reply;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    return [
        'thread_id' => App\Thread::pluck('id')->random(),
        'user_id' => App\User::pluck('id')->random(),
        'body' => $faker->paragraphs(rand(3,7),true),
    ];
});

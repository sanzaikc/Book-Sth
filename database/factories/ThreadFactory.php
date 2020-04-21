<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Thread;
use Faker\Generator as Faker;

$factory->define(Thread::class, function (Faker $faker) {
    return [
        'user_id' => App\User::pluck('id')->random(),
        'title' => $faker->sentence,
        'body' => $faker->paragraphs(rand(3,7),true),
        'view_count'=> rand(0,10),
        'reply_count'=> rand(0,10),
        'vote_count'=> rand(-10,10),
    ];
});

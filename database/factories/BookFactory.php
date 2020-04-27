<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'user_id' => App\User::pluck('id')->random(),
        'title' => $faker->sentence,
        'cover_img' => "https://picsum.photos/200/300",
        'description' => $faker->paragraphs(rand(3,7),true),
    ];
});

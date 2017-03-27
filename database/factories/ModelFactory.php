<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Forum\User::class, function (Faker\Generator $faker) {
    $data = [
        'username' => $faker->userName . str_random(1),
        'email' => $faker->safeEmail . str_random(3),
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];

    if (mt_rand(0, 10))
    {
        $description = [
            'description' => $faker->realText(300),
        ];

        $data = array_merge($data, $description);
    }

    if (mt_rand(0, 10))
    {
        $fullName = [
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
        ];

        $data = array_merge($data, $fullName);
    }

    return $data;
});

$factory->define(Forum\Post::class, function (Faker\Generator $faker) {
    $title = $faker->realText(90);

    return [
        'user_id' => $faker->numberBetween(3, 10),
        'title' => $title,
        'body' => $faker->realText(5000),
        'slug' => str_slug($title),
    ];
});

$factory->define(Forum\Comment::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->numberBetween(3, 10),
        'post_id' => $faker->numberBetween(3, 10),
        'body' => $faker->realText(300),
    ];
});

$factory->define(Forum\Reply::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->numberBetween(3, 10),
        'comment_id' => $faker->numberBetween(3, 10),
        'body' => $faker->realText(300),
    ];
});

$factory->define(Forum\Rating::class, function (Faker\Generator $faker) {
    $type = mt_rand(0, 2);
    $rateableType = null;

    if ($type == 0)
    {
        $rateableType = 'Forum\Post';
    }
    else if ($type == 1)
    {
        $rateableType = 'Forum\Comment';
    }
    else
    {
        $rateableType = 'Forum\Reply';
    }

    return [
        'user_id' => $faker->numberBetween(3, 10),
        'rateable_id' => $faker->numberBetween(3, 10),
        'rateable_type' => $rateableType,
    ];
});

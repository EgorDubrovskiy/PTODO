<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UserTaskTemplate;
use Faker\Generator as Faker;

$factory->define(UserTaskTemplate::class, function (Faker $faker) {
    return [
        'created_at' => config('database.seeders.test.common_config.created_at'),
        'updated_at' => now(),
        'deleted_at' => null,
        'name' => $faker->realText(60),
        'available_for_all' => false,
        'user_id' => null,
    ];
});

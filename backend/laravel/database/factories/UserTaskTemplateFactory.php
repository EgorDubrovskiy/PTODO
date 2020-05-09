<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UserTaskTemplate;
use Faker\Generator as Faker;

$factory->define(UserTaskTemplate::class, function (Faker $faker) {
    return [
        'created_at' => $faker->dateTime(),
        'updated_at' => now(),
        'deleted_at' => null,
        'name' => $faker->realText(60),
        'available_for_all' => false,
        'task_template_id' => null,
        'user_id' => null,
    ];
});

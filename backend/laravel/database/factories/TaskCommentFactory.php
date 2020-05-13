<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TaskComment;
use Faker\Generator as Faker;

$factory->define(TaskComment::class, function (Faker $faker) {
    return [
        'created_at' => $faker->dateTime(),
        'updated_at' => now(),
        'deleted_at' => null,
        'task_id' => null,
        'text' => $faker->realText(8000),
    ];
});

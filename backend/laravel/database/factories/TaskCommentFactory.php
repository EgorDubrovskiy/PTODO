<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TaskComment;
use Faker\Generator as Faker;

$factory->define(TaskComment::class, function (Faker $faker) {
    return [
        'created_at' => config('database.seeders.test.common_config.created_at'),
        'updated_at' => now(),
        'deleted_at' => null,
        'task_id' => null,
        'text' => $faker->realText(8000),
    ];
});

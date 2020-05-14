<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tasks\TaskTemplate;
use Faker\Generator as Faker;

$factory->define(TaskTemplate::class, function (Faker $faker) {
    return [
        'created_at' => config('database.seeders.test.common_config.created_at'),
        'updated_at' => now(),
        'deleted_at' => null,
        'text' => $faker->realText(60),
        'parent_task_id' => null,
        'user_id' => null,
        'user_task_template_id' => null,
    ];
});

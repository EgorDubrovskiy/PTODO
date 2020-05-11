<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tasks\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    $createdAt = $faker->dateTime('01.01.2020');
    $startedAt = $faker->dateTimeBetween(
        (clone $createdAt)->add(new DateInterval('PT1S')),
        (clone $createdAt)->add(new DateInterval('PT5H'))
    );

    return [
        'created_at' => $createdAt,
        'updated_at' => now(),
        'deleted_at' => null,
        'started_at' => $startedAt,
        'done_at' => $faker->dateTimeBetween(
            (clone $startedAt)->add(new DateInterval('PT1M')),
            (clone $startedAt)->add(new DateInterval('PT5H'))
        ),
        'scheduled_at' => $startedAt->format('Y-m-d'),
        'notify_at' => $faker->dateTimeBetween(
            (clone $startedAt)->add(new DateInterval('PT1M')),
            (clone $startedAt)->add(new DateInterval('PT10H'))
        ),
        'expected_time' => $faker->dateTimeBetween(
            (new DateTime())->setTime(0, 5),
            (new DateTime())->setTime(10, 0)
        )->format('H:i:s'),
        'text' => $faker->realText(60),
        'parent_task_id' => null,
        'user_id' => null,
    ];
});

<?php

namespace App\Models;

/**
 * Class Task
 * @package App\Models
 *
 * Database fields:
 * @property string|null $started_at
 * @property string|null $done_at
 * @property string $scheduled_at
 * @property string|null $notify_at
 * @property string|null $expected_time
 */
class Task extends TaskTemplate
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'started_at',
        'scheduled_at',
        'expected_time',
        'text',
        'notify_at',
    ];
}

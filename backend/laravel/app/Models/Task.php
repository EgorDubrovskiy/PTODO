<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Task
 * @package App\Models
 * @property-read int $id
 * @property-read string $created_at
 * @property-read string $updated_at
 * @property string|null $started_at
 * @property string|null $done_at
 * @property string $scheduled_at
 * @property string|null $notify_at
 * @property string|null $expected_time
 * @property int|null $parent_task_id
 * @property int $user_id
 * @property string $text
 */
class Task extends Model
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

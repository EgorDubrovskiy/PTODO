<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Task
 * @package App\Models
 * @property-read int $id
 * @property-read string $createdAt
 * @property-read string $updatedAt
 * @property-read string|null $deletedAt
 * @property string|null $startedAt
 * @property string|null $doneAt
 * @property string $scheduledAt
 * @property string|null $notifyAt
 * @property string|null $expectedTime
 * @property int|null $parentTaskId
 * @property int $userId
 * @property string $text
 */
class Task extends Model
{
    use SoftDeletes;

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

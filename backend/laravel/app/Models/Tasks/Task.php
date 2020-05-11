<?php

namespace App\Models;

use App\Interfaces\Models\Tasks\TaskRelationshipsInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Task
 * @package App\Models
 *
 * Database fields:
 * @property-read int $id
 * @property-read string $created_at
 * @property-read string $updated_at
 * @property-read string|null $deleted_at
 * @property string $text
 * @property int|null $parent_task_id
 * @property int $user_id
 * @property string|null $parent_path
 * @property string|null $started_at
 * @property string|null $done_at
 * @property string $scheduled_at
 * @property string|null $notify_at
 * @property string|null $expected_time
 *
 * Relations:
 * @property Collection $childTasks
 */
class Task extends Model implements TaskRelationshipsInterface
{
    use SoftDeletes, TaskRelationshipsTrait;

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

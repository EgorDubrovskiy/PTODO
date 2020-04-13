<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Task
 * @package App\Models
 *
 * Database fields:
 * @property-read int $id
 * @property-read string $created_at
 * @property-read string $updated_at
 * @property-read string|null $deleted_at
 * @property string|null $started_at
 * @property string|null $done_at
 * @property string $scheduled_at
 * @property string|null $notify_at
 * @property string|null $expected_time
 * @property int|null $parent_task_id
 * @property int $user_id
 * @property string $text
 *
 * Relations:
 * @property Collection $childTasks
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

    /**
     * @return HasMany
     */
    public function childTasks(): HasMany
    {
        return $this->hasMany(Task::class, 'parent_task_id');
    }
}

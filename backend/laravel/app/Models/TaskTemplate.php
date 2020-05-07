<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TaskTemplate
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
 *
 * Relations:
 * @property Collection $childTasks
 */
class TaskTemplate extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text',
    ];

    /**
     * @return HasMany
     */
    public function childTasks(): HasMany
    {
        return $this->hasMany(get_class($this), 'parent_task_id');
    }
}

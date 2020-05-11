<?php

namespace App\Models\Tasks;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Contains common logic for Task and TaskTemplate models
 *
 * Class BaseTask
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
abstract class BaseTask extends Model
{
    use SoftDeletes;

    /**
     * @return HasMany
     */
    public function childTasks(): HasMany
    {
        return $this->hasMany(get_class($this), 'parent_task_id');
    }
}

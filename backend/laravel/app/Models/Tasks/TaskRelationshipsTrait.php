<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Implements TaskRelationshipsInterface
 *
 * Trait TaskRelationshipsTrait
 * @package App\Models
 */
trait TaskRelationshipsTrait
{
    /**
     * @return HasMany
     */
    public function childTasks(): HasMany
    {
        return $this->hasMany(get_class($this), 'parent_task_id');
    }
}

<?php

namespace App\Interfaces\Models\Tasks;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Interface TaskRelationshipsInterface
 * @package App\Interfaces\Models\Tasks
 */
interface TaskRelationshipsInterface
{
    /**
     * @return HasMany
     */
    public function childTasks(): HasMany;
}

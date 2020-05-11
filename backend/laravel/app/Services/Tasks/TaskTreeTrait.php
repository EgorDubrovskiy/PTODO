<?php

namespace App\Services\Tasks;

use App\Models\Tasks\BaseTask;
use Illuminate\Database\Eloquent\Collection;

/**
 * Trait for tree logic for Task and TaskTemplate.
 * Implements TaskTreeInterface.
 *
 * Trait TaskTreeTrait
 * @package App\Services\Tasks
 */
trait TaskTreeTrait
{
    /**
     * @param BaseTask|null $parentTask
     * @return string|null
     */
    public function generateParentPath($parentTask): ?string
    {
        if (!$parentTask) {
            return null;
        }

        return $parentTask->parent_path ? "$parentTask->parent_path.$parentTask->id" : "$parentTask->id";
    }

    /**
     * @param Collection $tasks
     * @param BaseTask|null $parentTask
     * @return void
     */
    public function setPathsForSameParent(Collection $tasks, $parentTask): void
    {
        $parentPath = $this->generateParentPath($parentTask);

        foreach ($tasks as $task) {
            $task->parent_path = $parentPath;
        }
    }
}

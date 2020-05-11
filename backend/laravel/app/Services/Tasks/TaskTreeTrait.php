<?php

namespace App\Services\Tasks;

use App\Models\Task;
use App\Models\TaskTemplate;
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
     * @param TaskTemplate|null $parentTask
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
     * @param TaskTemplate|Task|null $parentTask
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
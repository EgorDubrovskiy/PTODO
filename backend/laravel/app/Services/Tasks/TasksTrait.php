<?php

namespace App\Services\Tasks;

use App\Interfaces\Repositories\ModelRepositoryInterface;
use App\Models\TaskTemplate;

/**
 * Trait for common behavior for Task and TaskTemplate.
 * Implements TasksServiceInterface.
 *
 * Trait TaskServicesTrait
 * @package App\Services\Tasks
 */
trait TasksTrait
{
    /**
     * @var ModelRepositoryInterface $repository
     */
    protected $repository;

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
}

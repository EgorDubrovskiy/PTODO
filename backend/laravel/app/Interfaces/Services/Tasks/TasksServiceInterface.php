<?php

namespace App\Interfaces\Services\Tasks;

use App\Interfaces\Services\ModelServiceInterface;
use App\Models\TaskTemplate;

/**
 * Interface for common behavior for Task and TaskTemplate
 *
 * Class TasksServiceInterface
 * @package App\Interfaces\Services\Task
 */
interface TasksServiceInterface extends ModelServiceInterface
{
    /**
     * @param TaskTemplate|null $parentTask
     * @return string|null
     */
    public function generateParentPath($parentTask): ?string;
}

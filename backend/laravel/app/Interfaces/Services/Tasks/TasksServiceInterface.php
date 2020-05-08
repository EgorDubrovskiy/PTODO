<?php

namespace App\Interfaces\Services\Tasks;

use App\Interfaces\Services\ModelServiceInterface;
use App\Models\Task;
use App\Models\TaskTemplate;
use Illuminate\Database\Eloquent\Collection;

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

    /**
     * @param Collection $tasks
     * @param TaskTemplate|Task|null $parentTask
     * @return void
     */
    public function setPathsForSameParent(Collection $tasks, $parentTask): void;
}

<?php

namespace App\Interfaces\Services\Tasks;

use App\Models\Task;
use App\Models\TaskTemplate;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface  for tree logic for Task and TaskTemplate
 *
 * Interface TaskTreeInterface
 * @package App\Interfaces\Services\Tasks
 */
interface TaskTreeInterface
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

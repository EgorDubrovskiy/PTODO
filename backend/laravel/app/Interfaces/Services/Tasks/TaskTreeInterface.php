<?php

namespace App\Interfaces\Services\Tasks;

use App\Models\BaseTask;
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
     * @param BaseTask|null $parentTask
     * @return string|null
     */
    public function generateParentPath($parentTask): ?string;

    /**
     * @param Collection $tasks
     * @param BaseTask|null $parentTask
     * @return void
     */
    public function setPathsForSameParent(Collection $tasks, $parentTask): void;
}

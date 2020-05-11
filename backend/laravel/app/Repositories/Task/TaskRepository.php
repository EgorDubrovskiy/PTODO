<?php

namespace App\Repositories\Task;

use App\Interfaces\Repositories\Task\TaskRepositoryInterface;
use App\Models\Tasks\Task;
use App\Repositories\BaseRepository;

/**
 * Class TaskRepository
 * @package App\Repositories\Task
 */
class TaskRepository extends BaseRepository implements TaskRepositoryInterface
{
    /**
     * TaskRepository constructor.
     * @param Task $model
     */
    public function __construct(Task $model)
    {
        parent::__construct($model);
    }
}

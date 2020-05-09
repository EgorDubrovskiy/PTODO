<?php

namespace App\Services\Tasks;

use App\Interfaces\Repositories\Task\TaskRepositoryInterface;
use App\Interfaces\Services\Tasks\TaskServiceInterface;
use App\Services\ModelService;

/**
 * Class TaskService
 * @package App\Services\Tasks
 */
class TaskService extends ModelService implements TaskServiceInterface
{
    use TaskTreeTrait;

    /**
     * TaskService constructor.
     * @param TaskRepositoryInterface $repository
     */
    public function __construct(TaskRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}

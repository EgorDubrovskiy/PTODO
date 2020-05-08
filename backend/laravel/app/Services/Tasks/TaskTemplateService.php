<?php

namespace App\Services\Tasks;

use App\Interfaces\Repositories\TaskTemplate\TaskTemplateRepositoryInterface;
use App\Interfaces\Services\Tasks\TaskTemplateServiceInterface;
use App\Services\ModelService;

/**
 * Class TaskTemplateService
 * @package App\Services\Tasks
 */
class TaskTemplateService extends ModelService implements TaskTemplateServiceInterface
{
    use TasksTrait;

    /**
     * TaskTemplateService constructor.
     * @param TaskTemplateRepositoryInterface $repository
     */
    public function __construct(TaskTemplateRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}

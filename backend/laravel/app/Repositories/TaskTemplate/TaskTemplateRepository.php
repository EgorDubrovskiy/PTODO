<?php

namespace App\Repositories\TaskTemplate;

use App\Interfaces\Repositories\TaskTemplate\TaskTemplateRepositoryInterface;
use App\Models\Tasks\TaskTemplate;
use App\Repositories\BaseRepository;

/**
 * Class TaskTemplateRepository
 * @package App\Repositories\TaskTemplate
 */
class TaskTemplateRepository extends BaseRepository implements TaskTemplateRepositoryInterface
{
    /**
     * TaskTemplateRepository constructor.
     * @param TaskTemplate $model
     */
    public function __construct(TaskTemplate $model)
    {
        parent::__construct($model);
    }
}

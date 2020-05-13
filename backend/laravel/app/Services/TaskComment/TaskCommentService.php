<?php

namespace App\Services\TaskComment;

use App\Interfaces\Repositories\TaskComment\TaskCommentRepositoryInterface;
use App\Interfaces\Services\TaskComment\TaskCommentServiceInterface;
use App\Services\ModelService;

/**
 * Class TaskCommentService
 * @package App\Services\TaskComment
 */
class TaskCommentService extends ModelService implements TaskCommentServiceInterface
{
    /**
     * TaskCommentService constructor.
     * @param TaskCommentRepositoryInterface $repository
     */
    public function __construct(TaskCommentRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}

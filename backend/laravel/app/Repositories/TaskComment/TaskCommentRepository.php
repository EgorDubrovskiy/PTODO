<?php

namespace App\Repositories\TaskComment;

use App\Interfaces\Repositories\TaskComment\TaskCommentRepositoryInterface;
use App\Models\TaskComment;
use App\Repositories\BaseRepository;

/**
 * Class TaskCommentRepository
 * @package App\Repositories\TaskComment
 */
class TaskCommentRepository extends BaseRepository implements TaskCommentRepositoryInterface
{
    /**
     * TaskCommentRepository constructor.
     * @param TaskComment $model
     */
    public function __construct(TaskComment $model)
    {
        parent::__construct($model);
    }
}

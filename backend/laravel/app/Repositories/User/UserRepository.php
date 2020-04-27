<?php

namespace App\Repositories\User;

use App\User;
use App\Repositories\BaseRepository;
use App\Interfaces\Repositories\User\UserRepositoryInterface;

/**
 * Class UserRepository
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * UserRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}

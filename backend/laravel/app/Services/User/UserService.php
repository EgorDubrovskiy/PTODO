<?php

namespace App\Services\User;

use App\Interfaces\Repositories\User\UserRepositoryInterface;
use App\Interfaces\Services\User\UserServiceInterface;
use App\Services\ModelService;

/**
 * Class UserService
 * @package App\Services\User
 */
class UserService extends ModelService implements UserServiceInterface
{
    /**
     * UserService constructor.
     * @param UserRepositoryInterface $repository
     */
    public function __construct(UserRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}

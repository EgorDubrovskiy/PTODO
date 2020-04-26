<?php

namespace App\Repositories\User;

use App\User;
use App\Repositories\BaseRepository;
use App\Interfaces\Repositories\User\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

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

    /**
     * @param array $columns
     * @return Collection
     */
    public function all(array $columns = []): Collection
    {
        return $this->newQuery()->get($columns);
    }
}

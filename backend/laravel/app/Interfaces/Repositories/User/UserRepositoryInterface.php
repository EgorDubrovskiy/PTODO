<?php

namespace App\Interfaces\Repositories\User;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface UserRepositoryInterface
 * @package App\Interfaces\Repositories\User
 */
interface UserRepositoryInterface
{
    /**
     * @param array $columns
     * @return Collection
     */
    public function all(array $columns = []): Collection;
}

<?php

namespace App\Interfaces\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface ModelRepositoryInterface
 * @package App\Interfaces\Repositories
 */
interface ModelRepositoryInterface
{
    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model;

    /**
     * @param int $id
     * @return Model|null
     */
    public function find(int $id): ?Model;

    /**
     * @param int $id
     * @return Model|null
     */
    public function findWithDeleted(int $id): ?Model;

    /**
     * @param array $columns
     * @return Collection
     */
    public function all(array $columns = ['*']): Collection;

    /**
     * @param array $columns
     * @return Collection
     */
    public function allDeleted(array $columns = ['*']): Collection;
}

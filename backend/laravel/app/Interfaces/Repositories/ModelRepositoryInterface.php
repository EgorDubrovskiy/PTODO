<?php

namespace App\Interfaces\Repositories;

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
}

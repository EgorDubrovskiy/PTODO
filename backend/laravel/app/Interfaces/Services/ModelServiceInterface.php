<?php

namespace App\Interfaces\Services;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface ModelServiceInterface
 * @package App\Interfaces\Services
 */
interface ModelServiceInterface
{
    /**
     * @param int $id
     * @return Model|null
     */
    public function find(int $id): ?Model;

    /**
     * @param array $columns
     * @return Model|null
     */
    public function getRandomModel(array $columns = []): ?Model;

    /**
     * @return int|null
     */
    public function getRandomModelId(): ?int;
}

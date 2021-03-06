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
     * @param array $columns
     * @return Model|null
     */
    public function getTestRandomModel(array $columns = ['*']): ?Model;

    /**
     * @return int|null
     */
    public function getTestRandomModelId(): ?int;
}

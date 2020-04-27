<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Interfaces\Repositories\ModelRepositoryInterface;

/**
 * Class BaseRepository
 */
class BaseRepository implements ModelRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * ModelRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->newQuery()->create($attributes);
    }

    /**
     * @param int $id
     * @return Model|null
     */
    public function find(int $id): ?Model
    {
        return $this->newQuery()->find($id);
    }

    /**
     * @param array $columns
     * @return Collection
     */
    public function all(array $columns = []): Collection
    {
        return $this->newQuery()->get($columns);
    }

    /**
     * @return Builder
     */
    protected function newQuery(): Builder
    {
        return $this->model->newQuery();
    }
}

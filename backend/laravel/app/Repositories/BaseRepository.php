<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Interfaces\Repositories\ModelRepositoryInterface;

/**
 * Class BaseRepository
 * @package App\Repositories
 */
abstract class BaseRepository implements ModelRepositoryInterface
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
     * @param int $id
     * @return Model|null
     */
    public function findWithDeleted(int $id): ?Model
    {
        return $this->newQuery()->withTrashed()->find($id);
    }

    /**
     * @param array $columns
     * @return Collection
     */
    public function all(array $columns = ['*']): Collection
    {
        return $this->newQuery()->get($columns);
    }

    /**
     * @param array $columns
     * @return Collection
     */
    public function allDeleted(array $columns = ['*']): Collection
    {
        return $this->newQuery()->onlyTrashed()->get($columns);
    }

    /**
     * @param int $count
     * @param callable $callback
     * @param array $columns
     * @return bool
     */
    public function chunkOfAll(int $count, callable $callback, array $columns = ['*']): bool
    {
        return $this
            ->newQuery()
            ->select($columns)
            ->chunk($count, $callback);
    }

    /**
     * @return Builder
     */
    protected function newQuery(): Builder
    {
        return $this->model->newQuery();
    }
}

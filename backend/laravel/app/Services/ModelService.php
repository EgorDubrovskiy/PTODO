<?php

namespace App\Services;

use App\Interfaces\Repositories\ModelRepositoryInterface;
use App\Interfaces\Services\ModelServiceInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ModelService
 * @package App\Services
 */
abstract class ModelService implements ModelServiceInterface
{
    /**
     * @var ModelRepositoryInterface $repository
     */
    protected $repository;

    /**
     * ModelService constructor.
     * @param ModelRepositoryInterface $repository
     */
    public function __construct(ModelRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $id
     * @return Model|null
     */
    public function find(int $id): ?Model
    {
        return $this->repository->find($id);
    }

    /**
     * @param array $columns
     * @return Model|null
     */
    public function getRandomModel(array $columns = []): ?Model
    {
        $modelsCollection = $this->repository->all($columns);

        return $modelsCollection->count() > 0 ? $modelsCollection->random() : null;
    }

    /**
     * @return int|null
     */
    public function getRandomModelId(): ?int
    {
        $model = $this->getRandomModel(['id']);

        return $model ? $model->id : null;
    }
}

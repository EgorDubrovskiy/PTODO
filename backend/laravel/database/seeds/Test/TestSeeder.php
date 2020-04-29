<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Collection;
use App\Interfaces\Services\DatabaseFactory\FactoryStateServiceInterface;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Database\Eloquent\FactoryBuilder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TestSeeder
 */
abstract class TestSeeder extends Seeder
{
    /**
     * @var FactoryStateServiceInterface $stateService
     */
    protected $stateService;

    /**
     * @var Factory $eloquentFactory
     */
    protected $eloquentFactory;

    /**
     * TestSeeder constructor.
     * @param FactoryStateServiceInterface $stateService
     * @param Factory $eloquentFactory
     */
    public function __construct(FactoryStateServiceInterface $stateService, Factory $eloquentFactory)
    {
        $this->stateService = $stateService;
        $this->eloquentFactory = $eloquentFactory;
    }

    /**
     * @param string $className
     * @param array $stateAttributes
     * @param int $amount
     * @return Collection
     */
    public function createWithCustomAttributes(string $className, array $stateAttributes, int $amount = 1): Collection
    {
        $modelsCollection = $this->makeWithCustomAttributes($className, $stateAttributes, $amount);
        $modelsCollection->map(function (Model $model) {
            $model->save();
        });

        return $modelsCollection;
    }

    /**
     * @param string $className
     * @param array $stateAttributes
     * @param int $amount
     * @return Collection
     */
    public function makeWithCustomAttributes(string $className, array $stateAttributes, int $amount = 1): Collection
    {
        $modelsCollection = $this->getFactoryBuilder($className, $amount)->make();
        $modelsCollection->map(function (Model $model) use ($stateAttributes) {
            $state = $this->stateService->getStateByAttributes($stateAttributes);

            foreach ($state as $attributeName => $attributeValue) {
                $model->$attributeName = $attributeValue;
            }
        });

        return $modelsCollection;
    }

    /**
     * @param string $className
     * @param int $amount
     * @return FactoryBuilder
     */
    protected function getFactoryBuilder(string $className, int $amount): FactoryBuilder
    {
        return $this->eloquentFactory->of($className)->times($amount);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Collection;
use App\Interfaces\Services\DatabaseFactory\FactoryStateServiceInterface;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Database\Eloquent\FactoryBuilder;

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
        $state = $this->stateService->getStateByAttributes($stateAttributes);

        return $this->getFactoryBuilder($className, $amount)->create($state);
    }

    /**
     * @param string $className
     * @param array $stateAttributes
     * @param int $amount
     * @return Collection
     */
    public function makeWithCustomAttributes(string $className, array $stateAttributes, int $amount = 1): Collection
    {
        $state = $this->stateService->getStateByAttributes($stateAttributes);

        return $this->getFactoryBuilder($className, $amount)->make($state);
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

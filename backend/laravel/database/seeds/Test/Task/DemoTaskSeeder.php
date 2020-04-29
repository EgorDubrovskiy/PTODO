<?php

use App\Models\Task;
use App\Interfaces\Services\DatabaseFactory\FactoryStateServiceInterface;
use Illuminate\Database\Eloquent\Factory;

/**
 * Class DemoTaskSeeder
 */
class DemoTaskSeeder extends DemoTaskTemplateSeeder
{
    /**
     * DemoTaskSeeder constructor.
     * @param FactoryStateServiceInterface $stateService
     * @param Factory $eloquentFactory
     */
    public function __construct(FactoryStateServiceInterface $stateService, Factory $eloquentFactory)
    {
        $this->stateService = $stateService;
        $this->eloquentFactory = $eloquentFactory;

        $this->taskModel = Task::class;

        $this->amountChildTasks = (int) config('database.seeders.test.task.demo_task.amount_children_for_nested');
        $this->amountNested = (int) config('database.seeders.test.task.demo_task.amount_nested');
        $this->taskOwnerId = (int) config('database.test_user_id');
    }
}

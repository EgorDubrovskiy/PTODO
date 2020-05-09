<?php

use App\Models\Task;
use App\Interfaces\Services\DatabaseFactory\FactoryStateServiceInterface;
use Illuminate\Database\Eloquent\Factory;
use App\Interfaces\Services\Tasks\TaskServiceInterface;

/**
 * Class TestTaskTableSeeder
 */
class TestTaskTableSeeder extends TestTaskTemplateTableSeeder
{
    /**
     * TestTaskTableSeeder constructor.
     * @param FactoryStateServiceInterface $stateService
     * @param TaskServiceInterface $taskService
     * @param Factory $eloquentFactory
     */
    public function __construct(
        FactoryStateServiceInterface $stateService,
        TaskServiceInterface $taskService,
        Factory $eloquentFactory
    )
    {
        $this->stateService = $stateService;
        $this->taskService = $taskService;
        $this->eloquentFactory = $eloquentFactory;

        $this->taskModel = Task::class;
        $this->demoSeeder = DemoTaskSeeder::class;

        $this->amountDeletedTasks = (int) config('database.seeders.test.task.amount_deleted_tasks');
        $this->amountSimpleTasks = (int) config('database.seeders.test.task.amount_simple_tasks');
        $this->amountParentTasks = (int) config('database.seeders.test.task.amount_parent_tasks');
    }
}

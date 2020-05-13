<?php

use App\Models\Tasks\Task;
use App\Interfaces\Services\DatabaseFactory\FactoryStateServiceInterface;
use Illuminate\Database\Eloquent\Factory;
use App\Interfaces\Services\Tasks\TaskServiceInterface;
use App\Models\Tasks\BaseTask;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class DemoTaskSeeder
 */
class DemoTaskSeeder extends BaseDemoTaskSeeder
{
    /**
     * DemoTaskSeeder constructor.
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

        $this->amountChildTasks = (int) config('database.seeders.test.task.demo_task.amount_children_for_nested');
        $this->amountNested = (int) config('database.seeders.test.task.demo_task.amount_nested');
        $this->taskOwnerId = (int) config('database.test_user_id');
    }

    /**
     * @return BaseTask
     */
    protected function createDemoTask(): BaseTask
    {
        return $this->eloquentFactory->of($this->taskModel)->create(['user_id' => $this->taskOwnerId]);
    }

    /**
     * @param BaseTask $parentTask
     * @return Collection
     */
    protected function makeChildTasks(BaseTask $parentTask): Collection
    {
        return $this
            ->getFactoryBuilder($this->taskModel, $this->amountChildTasks)
            ->make(['user_id' => $parentTask->user_id]);
    }
}

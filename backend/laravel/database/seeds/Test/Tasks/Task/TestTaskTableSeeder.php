<?php

use App\Models\Tasks\Task;
use App\Interfaces\Services\DatabaseFactory\FactoryStateServiceInterface;
use Illuminate\Database\Eloquent\Factory;
use App\Interfaces\Services\Tasks\TaskServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Tasks\BaseTask;

/**
 * Class TestTaskTableSeeder
 */
class TestTaskTableSeeder extends BaseTestTaskSeeder
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

    /**
     * @param array $customStateAttributes
     * @param int $amount
     * @return Collection
     */
    protected function createRootTasks(array $customStateAttributes, int $amount): Collection
    {
        return $this->createWithCustomAttributes($this->taskModel, $customStateAttributes, $amount);
    }

    /**
     * @param BaseTask $parentTask
     * @return BaseTask
     */
    protected function makeChildTask(BaseTask $parentTask): BaseTask
    {
        return $this->eloquentFactory
            ->of($this->taskModel)
            ->make([
                'user_id' => $parentTask->user_id,
                'deleted_at' => $parentTask->deleted_at,
            ]);
    }
}

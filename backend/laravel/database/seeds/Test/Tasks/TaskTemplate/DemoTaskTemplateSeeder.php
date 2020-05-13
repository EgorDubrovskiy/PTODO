<?php

use App\Interfaces\Services\DatabaseFactory\FactoryStateServiceInterface;
use Illuminate\Database\Eloquent\Factory;
use App\Models\Tasks\TaskTemplate;
use App\Interfaces\Services\Tasks\TaskTemplateServiceInterface;
use App\Models\Tasks\BaseTask;
use Illuminate\Database\Eloquent\Collection;
use App\Models\UserTaskTemplate;

/**
 * Class DemoTaskTemplateSeeder
 */
class DemoTaskTemplateSeeder extends BaseDemoTaskSeeder
{
    /**
     * DemoTaskTemplateSeeder constructor.
     * @param FactoryStateServiceInterface $stateService
     * @param TaskTemplateServiceInterface $taskService
     * @param Factory $eloquentFactory
     */
    public function __construct(
        FactoryStateServiceInterface $stateService,
        TaskTemplateServiceInterface $taskService,
        Factory $eloquentFactory
    )
    {
        parent::__construct($stateService, $eloquentFactory);

        $this->taskService = $taskService;

        $this->taskModel = TaskTemplate::class;

        $this->amountChildTasks = (int) config('database.seeders.test.task_template.demo_template.amount_children_for_nested');
        $this->amountNested = (int) config('database.seeders.test.task_template.demo_template.amount_nested');
        $this->taskOwnerId = (int) config('database.test_user_id');
    }

    /**
     * @return BaseTask
     */
    protected function createDemoTask(): BaseTask
    {
        $userTaskTemplate = $this->eloquentFactory
            ->of(UserTaskTemplate::class)
            ->create(['user_id' => $this->taskOwnerId]);

        return $this->eloquentFactory
            ->of($this->taskModel)
            ->create([
                'user_id' => $this->taskOwnerId,
                'user_task_template_id' => $userTaskTemplate->id,
            ]);
    }

    /**
     * @param BaseTask $parentTask
     * @return Collection
     */
    protected function makeChildTasks(BaseTask $parentTask): Collection
    {
        return $this
            ->getFactoryBuilder($this->taskModel, $this->amountChildTasks)
            ->make([
                'user_id' => $parentTask->user_id,
                'user_task_template_id' => $parentTask->user_task_template_id,
            ]);
    }
}

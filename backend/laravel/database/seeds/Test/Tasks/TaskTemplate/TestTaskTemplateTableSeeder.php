<?php

use App\Models\Tasks\TaskTemplate;
use App\Interfaces\Services\DatabaseFactory\FactoryStateServiceInterface;
use Illuminate\Database\Eloquent\Factory;
use App\Interfaces\Services\Tasks\TaskTemplateServiceInterface;
use App\Models\Tasks\BaseTask;
use Illuminate\Database\Eloquent\Collection;
use App\Models\UserTaskTemplate;

/**
 * Class TestTaskTemplateTableSeeder
 */
class TestTaskTemplateTableSeeder extends BaseTestTaskSeeder
{
    /**
     * TestTaskTemplateTableSeeder constructor.
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
        $this->demoSeeder = DemoTaskTemplateSeeder::class;

        $this->amountDeletedTasks = (int) config('database.seeders.test.task_template.amount_deleted_templates');
        $this->amountSimpleTasks = (int) config('database.seeders.test.task_template.amount_simple_templates');
        $this->amountParentTasks = (int) config('database.seeders.test.task_template.amount_parent_templates');
    }

    /**
     * @param array $customStateAttributes
     * @param int $amount
     * @return Collection
     */
    protected function createRootTasks(array $customStateAttributes, int $amount): Collection
    {
        $taskTemplates = $this->makeWithCustomAttributes($this->taskModel, $customStateAttributes, $amount);

        /** @var TaskTemplate $taskTemplate */
        foreach ($taskTemplates as $taskTemplate) {
            /** @var UserTaskTemplate $userTaskTemplate */
            $userTaskTemplate = $this->eloquentFactory
                ->of(UserTaskTemplate::class)
                ->create([
                    'user_id' => $this->stateService->getUserIdAttribute(),
                    'deleted_at' => $taskTemplate->deleted_at,
                ]);

            $taskTemplate->user_task_template_id = $userTaskTemplate->id;
            $taskTemplate->user_id = $userTaskTemplate->user_id;

            $taskTemplate->save();
        }

        return $taskTemplates;
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
                'user_task_template_id' => $parentTask->user_task_template_id,
            ]);
    }
}

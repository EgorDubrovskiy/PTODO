<?php

use App\Interfaces\Services\DatabaseFactory\FactoryStateServiceInterface;
use Illuminate\Database\Eloquent\Factory;
use App\Models\TaskTemplate;
use App\Interfaces\Services\Tasks\TaskTreeInterface;
use App\Interfaces\Services\Tasks\TaskTemplateServiceInterface;

/**
 * Class DemoTaskTemplateSeeder
 */
class DemoTaskTemplateSeeder extends TestSeeder
{
    /**
     * @var TaskTreeInterface $taskService
     */
    protected $taskService;

    /**
     * @var string $taskModel
     */
    protected $taskModel;

    /**
     * @var int $amountChildTasks
     */
    protected $amountChildTasks;

    /**
     * @var int $amountNested
     */
    protected $amountNested;

    /**
     * @var int $taskOwnerId
     */
    protected $taskOwnerId;

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
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $demoTask = $this->eloquentFactory->of($this->taskModel)->create(['user_id' => $this->taskOwnerId]);
        $this->generateNested($demoTask, $this->amountNested);
    }

    /**
     * @param TaskTemplate $parentTask
     * @param int $amountNested
     */
    protected function generateNested(TaskTemplate $parentTask, int $amountNested): void
    {
        if ($amountNested === 0) {
            return;
        }

        $childTasks = $this->getFactoryBuilder($this->taskModel, $this->amountChildTasks)
            ->make(['user_id' => $parentTask->user_id]);
        $this->taskService->setPathsForSameParent($childTasks, $parentTask);

        $parentTask->childTasks()->saveMany($childTasks);

        $this->generateNested($childTasks->last(), --$amountNested);
    }
}

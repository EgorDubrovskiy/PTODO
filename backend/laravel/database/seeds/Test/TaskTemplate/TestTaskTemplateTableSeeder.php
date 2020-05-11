<?php

use App\Models\Tasks\TaskTemplate;
use App\Interfaces\Services\DatabaseFactory\FactoryStateServiceInterface;
use Illuminate\Database\Eloquent\Factory;
use App\Interfaces\Services\Tasks\TaskTreeInterface;
use App\Interfaces\Services\Tasks\TaskTemplateServiceInterface;
use App\Models\Tasks\BaseTask;

/**
 * Class TestTaskTemplateTableSeeder
 */
class TestTaskTemplateTableSeeder extends TestSeeder
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
     * @var string $demoSeeder
     */
    protected $demoSeeder;

    /**
     * @var int $amountDeletedTasks
     */
    protected $amountDeletedTasks;

    /**
     * @var int $amountSimpleTasks
     */
    protected $amountSimpleTasks;

    /**
     * @var int $amountParentTasks
     */
    protected $amountParentTasks;

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
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createWithCustomAttributes($this->taskModel, ['user_id'], $this->amountSimpleTasks);
        $this->createWithCustomAttributes($this->taskModel, ['user_id', 'deleted_at'], (int) ($this->amountDeletedTasks / 2));

        $this->generateParentTasks(['user_id'], $this->amountParentTasks);
        $this->generateParentTasks(['user_id', 'deleted_at'], (int) ($this->amountDeletedTasks / 4));

        $this->call($this->demoSeeder);
    }

    /**
     * @param array $customStateAttributes
     * @param int $amount
     */
    protected function generateParentTasks(array $customStateAttributes, int $amount): void
    {
        $this->createWithCustomAttributes($this->taskModel, $customStateAttributes, $amount)
            ->each(function (BaseTask $parentTask) {
                $childTask = $this->eloquentFactory->of($this->taskModel)
                    ->make([
                        'user_id' => $parentTask->user_id,
                        'deleted_at' => $parentTask->deleted_at,
                    ]);
                $childTask->parent_path = $this->taskService->generateParentPath($parentTask);

                $parentTask->childTasks()->save($childTask);
            });
    }
}

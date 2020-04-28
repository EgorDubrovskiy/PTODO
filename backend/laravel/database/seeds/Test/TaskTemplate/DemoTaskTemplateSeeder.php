<?php

use App\Interfaces\Services\DatabaseFactory\FactoryStateServiceInterface;
use Illuminate\Database\Eloquent\Factory;
use App\Models\TaskTemplate;

/**
 * Class DemoTaskTemplateSeeder
 */
class DemoTaskTemplateSeeder extends TestSeeder
{
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
     * @param Factory $eloquentFactory
     */
    public function __construct(FactoryStateServiceInterface $stateService, Factory $eloquentFactory)
    {
        parent::__construct($stateService, $eloquentFactory);

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
        $parentTask->childTasks()->saveMany($childTasks);

        $this->generateNested($childTasks->last(), --$amountNested);
    }
}

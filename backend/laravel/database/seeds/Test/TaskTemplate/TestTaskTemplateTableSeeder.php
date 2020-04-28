<?php

use App\Models\TaskTemplate;
use App\Interfaces\Services\DatabaseFactory\FactoryStateServiceInterface;
use Illuminate\Database\Eloquent\Factory;

/**
 * Class TestTaskTemplateTableSeeder
 */
class TestTaskTemplateTableSeeder extends TestSeeder
{
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
     * @param Factory $eloquentFactory
     */
    public function __construct(FactoryStateServiceInterface $stateService, Factory $eloquentFactory)
    {
        parent::__construct($stateService, $eloquentFactory);

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
            ->each(function (TaskTemplate $parentTask) {
                $childTask = $this->eloquentFactory->of($this->taskModel)
                    ->make([
                        'user_id' => $parentTask->user_id,
                        'deleted_at' => $parentTask->deleted_at,
                    ]);

                $parentTask->childTasks()->save($childTask);
            });
    }
}
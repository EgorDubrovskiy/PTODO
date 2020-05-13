<?php

use App\Interfaces\Services\Tasks\TaskTreeInterface;
use App\Models\Tasks\BaseTask;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class BaseDemoTaskSeeder
 */
abstract class BaseDemoTaskSeeder extends TestSeeder
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
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $demoTask = $this->createDemoTask();
        $this->generateNested($demoTask, $this->amountNested);
    }

    /**
     * @param BaseTask $parentTask
     * @param int $amountNested
     */
    protected function generateNested(BaseTask $parentTask, int $amountNested): void
    {
        if ($amountNested === 0) {
            return;
        }

        $childTasks = $this->makeChildTasks($parentTask);
        $this->taskService->setPathsForSameParent($childTasks, $parentTask);

        $parentTask->childTasks()->saveMany($childTasks);

        $this->generateNested($childTasks->last(), --$amountNested);
    }

    /**
     * @return BaseTask
     */
    abstract protected function createDemoTask(): BaseTask;

    /**
     * @param BaseTask $parentTask
     * @return Collection
     */
    abstract protected function makeChildTasks(BaseTask $parentTask): Collection;
}

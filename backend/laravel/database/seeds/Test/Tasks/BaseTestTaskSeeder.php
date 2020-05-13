<?php

use App\Interfaces\Services\Tasks\TaskTreeInterface;
use App\Models\Tasks\BaseTask;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class BaseTestTaskSeeder
 */
abstract class BaseTestTaskSeeder extends TestSeeder
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
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createRootTasks(['user_id'], $this->amountSimpleTasks);
        $this->createRootTasks(['user_id', 'deleted_at'], (int) ($this->amountDeletedTasks / 2));

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
        $this->createRootTasks($customStateAttributes, $amount)
            ->each(function (BaseTask $parentTask) {
                $childTask = $this->makeChildTask($parentTask);
                $childTask->parent_path = $this->taskService->generateParentPath($parentTask);

                $parentTask->childTasks()->save($childTask);
            });
    }

    /**
     * @param array $customStateAttributes
     * @param int $amount
     * @return Collection
     */
    abstract protected function createRootTasks(array $customStateAttributes, int $amount): Collection;

    /**
     * @param BaseTask $parentTask
     * @return BaseTask
     */
    abstract protected function makeChildTask(BaseTask $parentTask): BaseTask;
}

<?php

use Illuminate\Database\Seeder;
use App\Models\Task;

/**
 * Class TestTaskTableSeeder
 */
class TestTaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amountDeletedTasks = (int) config('database.seeders.test.task.amount_deleted_tasks');
        $amountSimpleTasks = (int) config('database.seeders.test.task.amount_simple_tasks');
        $amountParentTasks = (int) config('database.seeders.test.task.amount_parent_tasks');

        $this->generateTasksByStates(['random_user'], $amountSimpleTasks);
        $this->generateTasksByStates(['random_user', 'deleted'], (int) ($amountDeletedTasks / 2));

        $this->generateParentTasks(['random_user'], $amountParentTasks);
        $this->generateParentTasks(['random_user', 'deleted'], (int) ($amountDeletedTasks / 4));

        $this->generateDemoTask();
    }

    /**
     * @param array $factoryStates
     * @param int $amount
     * @return void
     */
    protected function generateTasksByStates(array $factoryStates, int $amount): void
    {
        factory(Task::class, $amount)
            ->states($factoryStates)
            ->create();
    }

    /**
     * @param array $factoryStates
     * @param int $amount
     * @return void
     */
    protected function generateParentTasks(array $factoryStates, int $amount): void
    {
        factory(Task::class, $amount)
            ->states($factoryStates)
            ->create()
            ->each(function (Task $parentTask) {
                $childTask = factory(Task::class)
                    ->make([
                        'user_id' => $parentTask->user_id,
                        'deleted_at' => $parentTask->deleted_at,
                    ]);

                $parentTask->childTasks()->save($childTask);
            });
    }

    /**
     * @return void
     */
    protected function generateDemoTask(): void
    {
        $amountChildTasks = (int) config('database.seeders.test.task.demo_task.amount_children_for_nested');
        $amountNested = (int) config('database.seeders.test.task.demo_task.amount_nested');
        $userId = (int) config('database.test_user_id');

        $task = factory(Task::class)->create(['user_id' => $userId]);
        $this->generateNestedForDemoTask(
            $task,
            $amountChildTasks,
            $amountNested
        );
    }

    /**
     * @param Task $parentTask
     * @param int $amountChildTasks
     * @param int $amountNested
     */
    protected function generateNestedForDemoTask(
        Task $parentTask,
        int $amountChildTasks,
        int $amountNested
    ): void
    {
        if ($amountNested === 0) {
            return;
        }

        $childTasks = factory(Task::class, $amountChildTasks)->make(['user_id' => $parentTask->user_id]);
        $parentTask->childTasks()->saveMany($childTasks);

        $this->generateNestedForDemoTask($childTasks->last(), $amountChildTasks, --$amountNested);
    }
}

<?php

use App\Interfaces\Repositories\Task\TaskRepositoryInterface;
use App\Interfaces\Services\DatabaseFactory\FactoryStateServiceInterface;
use App\Models\TaskComment;
use App\Models\Tasks\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factory;

/**
 * Class TestTaskCommentTableSeeder
 */
class TestTaskCommentTableSeeder extends TestSeeder
{
    /**
     * @var TaskRepositoryInterface $taskRepository
     */
    protected $taskRepository;

    /**
     * @var int $amountTasksPerChunk
     */
    protected $amountTasksPerChunk;

    /**
     * @var int $amountCommentsForTask
     */
    protected $amountCommentsForTask;

    /**
     * TestTaskCommentTableSeeder constructor.
     * @param FactoryStateServiceInterface $stateService
     * @param TaskRepositoryInterface $taskRepository
     * @param Factory $eloquentFactory
     */
    public function __construct(
        FactoryStateServiceInterface $stateService,
        TaskRepositoryInterface $taskRepository,
        Factory $eloquentFactory
    )
    {
        parent::__construct($stateService, $eloquentFactory);

        $this->taskRepository = $taskRepository;

        $this->amountTasksPerChunk = (int) config('database.seeders.test.task_comment.amount_tasks_per_chunk');
        $this->amountCommentsForTask = (int) config('database.seeders.test.task_comment.amount_comments_for_every_task');
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->taskRepository->chunkTestData(
            $this->amountTasksPerChunk,
            $this->getChunkHandler(),
            ['id', 'deleted_at']
        );
    }

    /**
     * @return callable
     */
    protected function getChunkHandler(): callable
    {
        return function (Collection $tasks) {
            /** @var Task $task */
            foreach ($tasks as $task) {
                $this
                    ->getFactoryBuilder(TaskComment::class, $this->amountCommentsForTask)
                    ->create([
                        'deleted_at' => $task->deleted_at,
                        'task_id' => $task->id,
                    ]);
            }
        };
    }
}

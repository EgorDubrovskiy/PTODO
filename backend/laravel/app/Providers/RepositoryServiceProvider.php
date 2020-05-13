<?php

namespace App\Providers;

use App\Interfaces\Repositories\Task\TaskRepositoryInterface;
use App\Interfaces\Repositories\TaskComment\TaskCommentRepositoryInterface;
use App\Interfaces\Repositories\TaskTemplate\TaskTemplateRepositoryInterface;
use App\Repositories\Task\TaskRepository;
use App\Repositories\TaskComment\TaskCommentRepository;
use App\Repositories\TaskTemplate\TaskTemplateRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\Repositories\ModelRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Interfaces\Repositories\User\UserRepositoryInterface;
use App\Repositories\User\UserRepository;

/**
 * Class RepositoryServiceProvider
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ModelRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(TaskTemplateRepositoryInterface::class, TaskTemplateRepository::class);
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
        $this->app->bind(TaskCommentRepositoryInterface::class, TaskCommentRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

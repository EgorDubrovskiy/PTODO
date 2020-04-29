<?php

namespace App\Providers;

use App\Interfaces\Repositories\TaskTemplate\TaskTemplateRepositoryInterface;
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

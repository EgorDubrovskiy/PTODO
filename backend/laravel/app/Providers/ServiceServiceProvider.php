<?php

namespace App\Providers;

use App\Interfaces\Services\DatabaseFactory\FactoryStateServiceInterface;
use App\Interfaces\Services\ModelServiceInterface;
use App\Interfaces\Services\Tasks\TaskTemplateServiceInterface;
use App\Interfaces\Services\User\UserServiceInterface;
use App\Services\DatabaseFactory\FactoryStateService;
use App\Services\ModelService;
use App\Services\Tasks\TaskTemplateService;
use App\Services\User\UserService;
use Illuminate\Support\ServiceProvider;

/**
 * Class ServiceServiceProvider
 * @package App\Providers
 */
class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ModelServiceInterface::class, ModelService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(FactoryStateServiceInterface::class, FactoryStateService::class);
        $this->app->bind(TaskTemplateServiceInterface::class, TaskTemplateService::class);
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

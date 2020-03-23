<?php

namespace App\Services\Task\Providers;

use App\Task;
use App\Services\Task\TaskService;
use App\Repositories\Task\TaskInterface;
use App\Repositories\Task\TaskRepository;
use Illuminate\Support\ServiceProvider;

class TaskServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */

    public function register()
    {
        $this->app->bind(TaskInterface::class,TaskRepository::class);
    }

    /**
      * Get the services provided by the provider.
      *
      * @return array
    */
    
    public function provides()
    {
           return [TaskService::class];
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

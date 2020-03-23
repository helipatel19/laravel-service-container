<?php

namespace App\Services\Task;

use App\Repositories\Task\TaskRepository;
use App\Task;

class TaskService
{
    private $taskRepo;

    // the task repository implementation.

    public function __construct(TaskRepository $taskRepo)
    {
        $this->taskRepo = $taskRepo;
    }

   // create a method to store tasks

    public function storeTask(array $parameters)
    {
        return $this->taskRepo->createTask($parameters);
    }

   // create a method to retrieve all the tasks

    public function getAllTasks()
    {
        return $this->taskRepo->viewTasks();
    }

    // create a method to update the task.

    public function updateTask($attr)
    {
        return $this->taskRepo->updateTask($attr);
    }

    // create a method to delete the task.

    public function deleteTask($id)
    {
        return $this->taskRepo->deleteTaskById($id);
    }


}

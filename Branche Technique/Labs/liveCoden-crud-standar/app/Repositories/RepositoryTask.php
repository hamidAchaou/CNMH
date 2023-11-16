<?php
namespace App\Repositories;

use App\Models\Task;
use App\Repositories\Interface\TaskInterface;

class RepositoryTask implements TaskInterface {
  public function create(array $data)
  {
    Task::create($data);
  }
}
<?php
namespace App\Repositories;

use App\Models\Task;
use App\Repositories\Interface\TaskInterface;

class RepositoryTask implements TaskInterface {

  // get All Tasks One Projects
  public function getAll($idProject){
    $tasks = Task::where('project_Id', $idProject)->paginate(4);
    return $tasks;
  }

  // Create One Tasks 
  public function create(array $data)
  {
    Task::create($data);
  }

// find One tasks
public function find($id)
{
  $tasks = Task::findOrfail($id);
  return $tasks;
}

// update tasls
public function update(array $data, $id)
{
  $task = $this->find($id);

  $task->update($data);
}

// delete Tasks
public function delete($id)
{
    $task = $this->find($id);
    $task->delete();
}

}
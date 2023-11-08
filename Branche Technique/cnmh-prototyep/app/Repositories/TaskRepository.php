<?php
namespace App\Repositories;

use App\Models\Task;
use App\Repositories\Interfaces\InterfaceTask;

class TaskRepository implements InterfaceTask {
    public function add(array $data) {
        Task::create($data);
        // Task::create($data);

    }

    // find One Task
    public function find(string $id) {
        $task = Task::findOrFail($id);
        return $task;

    }

    // update Task
    public function update(array $data, string $id) {
        $task = $this->find($id);
        if($task) {
            $task->update($data);
            return false;
        }

        return true;
    }

    // delete Task
    public function delete(string $id) {
        $task = $this->find($id);

        if($task) {
            $task->delete();
        }
    }



}
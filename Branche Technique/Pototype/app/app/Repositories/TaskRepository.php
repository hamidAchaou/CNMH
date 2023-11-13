<?php
namespace App\Repositories;

use App\Models\Task;
use App\Repositories\Interfaces\InterfaceTask;

class TaskRepository implements InterfaceTask {

    /** 
     * Get ALL Tasks
     */
    public function getAll($id)
    {
        $perPage = 3;
        return Task::where('project_id', '=', $id)->paginate($perPage);
    }


    /**
     * Add Tasks in data Bases 
     */
    public function add(array $data) {
        Task::create($data);
        // Task::create($data);

    }

    // find One Task
    public function find($id) {
        $task = Task::findOrFail($id);
        return $task;
    }

    // update Task
    public function update(array $data, $id) {
        $task = $this->find($id);
        if($task) {
            $task->update($data);
        }
    }

    // delete Task
    public function delete($id) {
        $task = $this->find($id);

        if($task) {
            $task->delete();
        }
    }



}
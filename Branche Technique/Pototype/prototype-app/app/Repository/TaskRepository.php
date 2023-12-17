<?php

namespace App\Repository;

use App\Models\Task;
use App\Repository\BaseRepository;

class TaskRepository extends BaseRepository{

    public function __construct(Task $model){
        $this->model = $model;
    }

    protected $fieldsTask = [
        'name','description','start_date','end_date','project_id'
    ];

    public function getFieldData():array{
        return $this->fieldsTask;
    }

    public function model():string{
        return Task::class;
    }

    public function getByProjectId($projectId, $perPage = 3) {
        $tasks = $this->model->where('project_id', $projectId)->paginate($perPage);
        return $tasks;
    }

    
    public function searchTasks($searchValue, $perPage = 4)
    {
        return $this->model
            ->where('name', 'LIKE', '%' . $searchValue . '%')
            ->orWhere('description', 'LIKE', '%' . $searchValue . '%')
            ->paginate($perPage);
    }
}
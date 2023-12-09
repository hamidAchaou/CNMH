<?php

namespace App\Repository;
use App\Repository\BasRepository;
use App\Models\Task;


class TasksRepository extends BasRepository {
    protected $model;

    public function __construct(Task $model)
    {
        $this->model = $model;
    }

    protected $fieldsTasks = [
        'name',
        'description',
        'project_Id ',
    ];

    public function getFeildsData(): array
    {
        return $this->fieldsTasks;
    }

    public function model(): string
    {
        return Task::class;
    }

    public function getByProjectId($projectId, $perPage = 3) {
        $tasks = $this->model->where('project_Id', $projectId)->paginate($perPage);
        return $tasks;
    }

    
    

    public function searchTasks($searchValue, $perPage = 4)
    {
        return $this->model
            ->where('nom', 'LIKE', '%' . $searchValue . '%')
            ->orWhere('description', 'LIKE', '%' . $searchValue . '%')
            ->paginate($perPage);
    }

    
}

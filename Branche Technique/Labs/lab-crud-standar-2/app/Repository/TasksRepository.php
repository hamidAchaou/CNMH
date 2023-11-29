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
        'project_Id',
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
        return $this->model->where('project_id', $projectId)->paginate($perPage);
    }

    public function searchTasks($searchValue, $perPage = 4)
    {
        return $this->model
            ->where('name', 'LIKE', '%' . $searchValue . '%')
            ->orWhere('description', 'LIKE', '%' . $searchValue . '%')
            ->paginate($perPage);
    }

    
}
